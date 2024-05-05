<?php

namespace App\Http\Controllers;

use App\Models\Notification;

class NotificationController extends Controller
{
    public function getNotifictions()
    {
        $notifications = Notification::query()
            ->where('user_id', auth()->user()->id)
            ->get();
        return view('Notification.notification', compact('notifications'));
    }
}
