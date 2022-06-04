<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Mail\MyTestMail;
use App\Models\Appointments;

class EmailController extends Controller
{
    public function verifyEmail($appointment_id){
        $appointment = Appointments::find($appointment_id);
        // if($user){
            \Mail::to($appointment->email)->send(new MyTestMail($appointment));
        // }else{
        //     return back()->with('Email Not Found');
        // }
    }
}
