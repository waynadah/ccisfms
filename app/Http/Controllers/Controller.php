<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    public function impr_info(Request $request)
    {
        $validated = $request->validate([
            'id' => 'required|string|max:20',
            'prog' => 'required|exists:programs,id',
        ]);

        $id_exist =  DB::table('users')->where('student_id', $validated['id'])->first();

        if ($id_exist) {
            return redirect()->back()->withErrors(['id' => 'Student ID already exist!']);
        }
        $user = DB::table('users')->where('id', auth()->id())->first();
        if (!$user) {
            return redirect()->back()->withErrors(['user' => 'User not found.']);
        }

        DB::table('users')->where('id', $user->id)->update([
            'student_id' => $validated['id'],
            'program' => $validated['prog'],
        ]);

        return redirect()->back()->with('success', 'Student information updated successfully.');
    }
}
