<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Notifications;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function index()
    {
        $userId = Auth::id();

        Notifications::where('to_user_id', $userId)
            ->where('is_read', 1)
            ->update(['is_read' => 0]);

      $notifications = Notifications::where('to_user_id', $userId)
    ->orderBy('priority', 'desc') // smaller number first = higher priority
    ->orderBy('created_at', 'desc')
    ->take(10)
    ->get();

        return view('controller.student_role.notification', compact('notifications'));
    }
}
