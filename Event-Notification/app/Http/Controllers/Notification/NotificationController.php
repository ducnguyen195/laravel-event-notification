<?php

namespace App\Http\Controllers\Notification;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{
    public function __contruct() {
        $this ->middleware('auth');
    }

    public function index() {
        $notifi = Auth::user()->notifications;
        return view('notification.index',['notifi' => $notifi]);
    }

    public function check($id) {
        $user = User::find($id);
        foreach ($user->unreadNotifications as $notification) {
            $notification->markAsRead();
        }
        return redirect()->back();
    }
}
