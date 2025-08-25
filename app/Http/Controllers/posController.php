<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class posController extends Controller
{
    public function index(Request $request)
    {
        // Get filters
        $search = $request->input('search');
        $organizationId = $request->input('organization');
        $dep = $request->input('department') ?? "CCIS";

        // Fetch fees with optional search and org filter
        $fees = DB::table('payment_list')
            ->when($search, function ($query, $search) {
                return $query->where('payment', 'like', '%' . $search . '%');
            })
            ->when($organizationId, function ($query, $organizationId) {
                return $query->where('organization_id', $organizationId);
            })
            ->orderBy('id', 'desc')
            ->take(150)
            ->get();

        // Fetch organizations for filter dropdown
        $organizations = DB::table('organization')
            ->select('id', 'description')
            ->orderBy('description', 'asc')
            ->get();

        // Fetch departments/programs
        $department = DB::table('programs')
            ->select('college')
            ->whereNotNull('college')
            ->distinct()
            ->get();

        $programs = DB::table('programs')
            ->where('college', $dep)
            ->whereNotNull('college')
            ->get();

        return view('controller.admin_role.pos', compact(
            'fees',
            'organizations',
            'department',
            'programs',
            'dep'
        ));
    }



    public function payment(Request $request)
    {

        $validated = $request->validate([
            'user_id'   => 'required|int',
            'student_id'   => 'required|string',
            'cart'         => 'required',
            'payment_method' => 'required|in:cash,gcash',
            'total' => 'required|numeric|min:0',
            'money_tendered' => 'required|numeric|min:0',
        ]);

        $cart = json_decode($validated['cart']);
        $totalAmount = $validated['total'];
        $moneyTendered = $validated['money_tendered'];
        $change = $moneyTendered - $totalAmount;
        if ($change < 0) {
            return back()->withErrors(['money_tendered' => 'Insufficient payment amount.'])->withInput();
        }
    }


    public function newpayment(Request $request)
    {
        $validated = $request->validate([
            'department' => 'required|string|max:255',
            'program'    => 'required|string|max:255',
            'payment'    => 'required|string|max:255',
            'amount'     => 'required|numeric|min:0',
            'due'        => 'required|date|after_or_equal:today',
            'penalty'    => 'nullable|numeric|min:0',
        ]);


        DB::table('payment_list')->insert([
            'department' => $validated['department'],
            'program_id'    => $validated['program'],
            'payment'       => $validated['payment'],
            'amount'     => $validated['amount'],
            'due'        => $validated['due'],
            'penalty'    => $validated['penalty'],
            'created_by' => auth()->user()->id,
        ]);
        return back()->with('success', 'New payment created!');
    }
}
