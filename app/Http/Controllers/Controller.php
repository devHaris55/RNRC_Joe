<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Spatie\GoogleCalendar\Event;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function appointmentSchedulePost(Request $request)
    {
       /*sending data to google calendar*/
            $event = new Event();
            $event->name = 'Appointment';
            // $event->startDateTime = Carbon::parse($data['date'].' '.$data['start'],'America/Los_Angeles');
            // $event->endDateTime = Carbon::parse($data['date'].' '.$data['start'],'America/Los_Angeles')->addMinutes(30);
            $event->startDate = Carbon::parse($request->date,'America/Los_Angeles');
            $event->endDate = Carbon::parse($request->date,'America/Los_Angeles');
            $event->save();
            // Session::flash('success', 'Appointment schedule successfully!');
            return back();
    }

}
