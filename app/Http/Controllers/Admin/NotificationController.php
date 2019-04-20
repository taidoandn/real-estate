<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class NotificationController extends Controller
{
    public function markAsRead(Request $request){
        if ($request->id === 'all') {
            $notification = auth('admin')->user()->unreadnotifications->markAsRead();
            return 1;
        }

        $notification = auth('admin')->user()->notifications()->findOrFail($request->id);
        if($notification) {
            return $notification->markAsRead();
        }
    }
}
