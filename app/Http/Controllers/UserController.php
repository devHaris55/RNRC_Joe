<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Appointments;
use Spatie\GoogleCalendar\Event;
use App\Models\CalendarEvents;

class UserController extends EmailController
{
    public function appointment_schedule(Request $request)
    {
        $req_start_date = Carbon::parse($request->date . '' . $request->start_time);
        $req_end_date = Carbon::parse($request->date . '' . $request->end_time);
        $req_hours = $req_start_date->diffInHours($req_end_date);

        /*sending data to Appointments table*/
        $schedule_appointment = new Appointments();
        $schedule_appointment->first_name = $request->first_name;
        $schedule_appointment->last_name = $request->last_name;
        $schedule_appointment->email = $request->email;
        $schedule_appointment->date = $request->date;
        $schedule_appointment->start_time = Carbon::parse($request->date . ' ' . $request->start_time);
        $schedule_appointment->end_time = Carbon::parse($request->date . ' ' . $request->end_time);
        $schedule_appointment->reason = $request->reason;

        //checking event occur on the requested date or not
        $calendar_event = CalendarEvents::where('date', $request->date)->first();
        // if event occurs on the requested date then appointment take place in cancelled appointment list
        // otherwise in assign appointment list/assigned conflict request
        if ($calendar_event) {
            $schedule_appointment->appearance_status = 1;
        } else {
            $schedule_appointment->appearance_status = 0;
        }
        $schedule_appointment->event_id = null;
        $schedule_appointment->form_type = $request->form_type;
        // $schedule_appointment->password =$request->password;
        $schedule_appointment->save();
        // Appointment -> Conflict Request


        //Email shooting
        $this->verifyEmail($schedule_appointment->id);
        return back()->with('success', 'Conflict Request done successfully');
    }
    public function full_appointment_schedule(Request $request)
    {

        /*sending data to Appointments table*/
        $schedule_appointment = new Appointments();
        $schedule_appointment->first_name = $request->first_name;
        $schedule_appointment->last_name = $request->last_name;
        $schedule_appointment->email = $request->email;
        $schedule_appointment->date = $request->date;
        $schedule_appointment->reason = $request->reason;
        // progress_status 0:processing    1:pending   2:completed    3:rejected


        //checking event occur on the requested date or not
        $calendar_event = CalendarEvents::where('date', $request->date)->first();
        // if event occurs on the requested date then appointment take place in cancelled appointment list
        // otherwise in assign appointment list/assigned conflict request
        if ($calendar_event) {
            $schedule_appointment->appearance_status = 1;
        } else {
            $schedule_appointment->appearance_status = 0;
        }
        $schedule_appointment->event_id = null;
        $schedule_appointment->form_type = $request->form_type;
        $schedule_appointment->save();

        //Email shooting
        $this->verifyEmail($schedule_appointment->id);

        return back()->with('success', 'Conflict Request done successfully');
    }

    public function recur_appointment_schedule(Request $request)
    {

        $req_start_date = Carbon::parse($request->date . '' . $request->start_time);
        $req_end_date = Carbon::parse($request->date . '' . $request->end_time);
        $req_hours = $req_start_date->diffInHours($req_end_date);


        /*sending data to Appointments table*/
        $schedule_appointment = new Appointments();
        $schedule_appointment->first_name = $request->first_name;
        $schedule_appointment->last_name = $request->last_name;
        $schedule_appointment->email = $request->email;
        $schedule_appointment->start_time = Carbon::parse($request->date . ' ' . $request->start_time);
        $schedule_appointment->end_time = Carbon::parse($request->date . ' ' . $request->end_time);
        $schedule_appointment->start_date = $request->start_date;
        $schedule_appointment->end_date = $request->end_date;
        $schedule_appointment->event_occur = $request->event_occur;
        $schedule_appointment->reason = $request->reason;


        //checking event occur on the requested date or not
        $calendar_event = CalendarEvents::where('date', $request->date)->first();
        // if event occurs on the requested date then appointment take place in cancelled appointment list
        // otherwise in assign appointment list/assigned conflict request
        if ($calendar_event) {
            $schedule_appointment->appearance_status = 1;
        } else {
            $schedule_appointment->appearance_status = 0;
        }
        $schedule_appointment->event_id = null;
        $schedule_appointment->form_type = $request->form_type;
        // $schedule_appointment->password =$request->password;
        $schedule_appointment->save();

        //Email shooting
        $this->verifyEmail($schedule_appointment->id);

        return back()->with('success', 'Conflict Request done successfully');
    }
    public function index()
    {
        return view('index');
    }














    // public function appointment_schedule(Request $request)
    public function rename(Request $request)
    // {
    //     $start_time = explode(':', $request->start_time);
    //     $end_time = explode(':', $request->end_time);
    //     $start = (int)$start_time[0];
    //     $end = (int)$end_time[0];
    //     if($end >> $start)
    {
        $req_start_date = Carbon::parse($request->date . '' . $request->start_time);
        $req_end_date = Carbon::parse($request->date . '' . $request->end_time);
        $req_hours = $req_start_date->diffInHours($req_end_date);

        // progress_status 0:processing    1:pending   2:completed    3:rejected
        $emailExist = Appointments::where('email', $request->email)
            ->where('progress_status', "!=", 2)
            ->where('progress_status', "!=", 3)
            ->get();

        if ($emailExist != null) {
            $conflictAppointments = Appointments::where('date', $request->date)
                ->where('appearance_status', 0)
                ->get();
            $check = false;
            foreach ($conflictAppointments as $conflictAppointment) {
                $proj_start_date = Carbon::parse($conflictAppointment->start_time);
                $proj_end_date = Carbon::parse($conflictAppointment->end_time);
                $proj_hours = $proj_start_date->diffInHours($proj_end_date);

                for ($i = 0; $i < $proj_hours; $i++) {
                    $proj_date = Carbon::parse($conflictAppointment->start_time)->addHours($i);

                    for ($j = 0; $j < $req_hours; $j++) {
                        if ($j != 0 && $proj_date != $conflictAppointment->end_time) {
                            $start_date = Carbon::parse($request->date . ' ' . $request->start_time)->addHours($j);
                            // $start_date = Carbon::parse($request->date.' '.$request->start_time)->addHours($i);
                            // $proj_date = Carbon::parse($conflictAppointment->start_time);
                            if ($start_date == $proj_date) {
                                $check = true;
                                break;
                            }
                        }
                        // $start_date = Carbon::parse($request->date.' '.$request->start_time)->addHours($j);
                        // // $start_date = Carbon::parse($request->date.' '.$request->start_time)->addHours($i);
                        // // $proj_date = Carbon::parse($conflictAppointment->start_time);
                        // if($start_date == $proj_date)
                        // {
                        //     $check = true;
                        //     break;
                        // }
                    }
                    if ($check) {
                        break;
                    }
                }
                if ($check) {
                    break;
                }
            }

            if (!$check) {
                /*sending data to google calendar*/
                $event = new Event();
                $event->name = 'Appointment schedule';
                // $event->startDateTime = Carbon::parse($request->date.' '. $request->start_time,'America/Los_Angeles');
                // $event->endDateTime = Carbon::parse($request->date.' '. $request->end_time,'America/Los_Angeles');
                $event->startDateTime = Carbon::parse($request->date . ' ' . $request->start_time, 'Asia/Karachi');
                $event->endDateTime = Carbon::parse($request->date . ' ' . $request->end_time, 'Asia/Karachi');
                // $event->startDate = Carbon::parse($request->date.' '. $request->start_time,'America/Los_Angeles');
                // $event->endDate = Carbon::parse($request->date.' '. $request->end_time,'America/Los_Angeles');
                $eventData = $event->save();

                /*sending data to Appointments table*/
                $schedule_appointment = new Appointments();
                $schedule_appointment->first_name = $request->first_name;
                $schedule_appointment->last_name = $request->last_name;
                $schedule_appointment->email = $request->email;
                $schedule_appointment->date = $request->date;
                // $schedule_appointment->start_time = $request->start_time;
                // $schedule_appointment->end_time = $request->end_time;
                $schedule_appointment->start_time = Carbon::parse($request->date . ' ' . $request->start_time);
                $schedule_appointment->end_time = Carbon::parse($request->date . ' ' . $request->end_time);
                $schedule_appointment->reason = $request->reason;
                // progress_status 0:processing    1:pending   2:completed    3:rejected
                $schedule_appointment->progress_status = 0;
                $schedule_appointment->appearance_status = 0;
                $schedule_appointment->event_id = $eventData->id;
                $schedule_appointment->save();
                return back()->with('success', 'Appointment done successfully');
            } else {
                //save data in table and show the msg that data stored etc
                /*sending data to Appointments table*/
                $schedule_appointment = new Appointments();
                $schedule_appointment->first_name = $request->first_name;
                $schedule_appointment->last_name = $request->last_name;
                $schedule_appointment->email = $request->email;
                $schedule_appointment->date = $request->date;
                $schedule_appointment->start_time = Carbon::parse($request->date . ' ' . $request->start_time);
                $schedule_appointment->end_time = Carbon::parse($request->date . ' ' . $request->end_time);
                $schedule_appointment->reason = $request->reason;
                // progress_status 0:processing    1:pending   2:completed    3:rejected
                $schedule_appointment->progress_status = 1;
                $schedule_appointment->appearance_status = 1;
                $schedule_appointment->save();
                return back()->with('warning', 'Appointment didn\'t Placed but we save your data. Our admin will schedule it soon');
            }
        } else {
            return back()->with('warning', 'You already have an appointment which is not completed yet! Please wait to until it complete.');
        }
    }
    //     else {
    //         return back()->with('error','Please select the start and end time correctly');
    //     }
    // }
}