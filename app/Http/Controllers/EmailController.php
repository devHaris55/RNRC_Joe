<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\MyTestMail;
use App\Mail\MailToAdmin;
use App\Models\Appointments;
use App\Models\User;

class EmailController extends Controller
{
    public function verifyEmail($appointment_id)
    {
        $admin = User::where('user_role', 1)->first();
        $appointment = Appointments::find($appointment_id);
        // if($user){
        \Mail::to($appointment->email)->send(new MyTestMail($appointment));
        \Mail::to($admin->email)->send(new MailToAdmin($appointment));
        // }else{
        //     return back()->with('Email Not Found');
        // }
    }
}