<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Appointments;
use Spatie\GoogleCalendar\Event;

class AdminController extends Controller
{
    public function index()
    {
        $data['assigned'] = Appointments::where('appearance_status', 0)->get();
        $data['un_assigned'] = Appointments::where('appearance_status', 1)->get();
        $data['canceled'] = Appointments::where('appearance_status', 2)->get();

        return view('admin-panel', $data);
    }
    
    public function assignedIndex()
    {
        $data['assigned'] = Appointments::where('appearance_status', 0)->get();
        return view('admin.assigned.assigned-list', $data);
    }
    public function un_assignedIndex()
    {
        $data['un_assigned'] = Appointments::where('appearance_status', 1)->get();
        return view('admin.un_assigned.un_assigned-list', $data);
    }
    public function cancelledIndex()
    {
        $data['cancelled'] = Appointments::where('appearance_status', 2)->get();
        return view('admin.cancelled.cancelled-list', $data);
    }
    
    public function cancel_appointment(Appointments $id)
    {
        //Deleting event from Google calendar
        // $event = Event::find($id->event_id);
        // $event->delete();

        //Updating Appointment table in our database 
        $id->event_id = null;
        $id->appearance_status = 2;
        // progress_status 0:processing    1:pending   2:completed    3:rejected
        $id->progress_status = 3;
        $id->save();

        // sending data to admin page
        $data['assigned'] = Appointments::where('appearance_status', 0)->get();
        $data['un_assigned'] = Appointments::where('appearance_status', 1)->get();
        $data['cancelled'] = Appointments::where('appearance_status', 2)->get();
        return view('admin.cancelled.cancelled-list', $data)->with('error','Appointment Cancelled successfully');
    }

    public function appointment_edit(Appointments $id)
    {
        $data['appointment'] = $id;
        //To select the value in dropdown
        $data['start_time'] = explode(' ',$id->start_time);
        $data['end_time'] = explode(' ',$id->end_time);
        return view('admin.assigned.assigned-edit', $data)->with('success','Appointment Edited successfully');;
    }

    public function update_appointment(Request $request, Appointments $id)
    {
        //if Appointment belongs to Canceled appointment ----------------------------------------------------------
        if($id->appearance_status == 2)
        {
            //if Admin request to assigned the appointment 
            if($request->appearance_status == 0)
            {
                $req_start_date = Carbon::parse($request->date. ''. $request->start_time);
                $req_end_date = Carbon::parse($request->date. ''. $request->end_time);
                $req_hours = $req_start_date->diffInHours($req_end_date);
                // progress_status 0:processing    1:pending   2:completed    3:rejected
                $emailExist = Appointments::where('email', $request->email)
                    ->where('progress_status', "!=", 2)
                    ->where('progress_status', "!=", 3)
                    ->get();
                if($emailExist != null)
                {
                    $conflictAppointments = Appointments::where('date', $request->date)
                        ->where('appearance_status', 0)
                        ->where('progress_status', "!=", 2)
                        ->where('progress_status', "!=", 3)->get();
                    $check = false;
                    foreach($conflictAppointments as $conflictAppointment)
                    {
                        $proj_start_date = Carbon::parse($conflictAppointment->start_time);
                        $proj_end_date = Carbon::parse($conflictAppointment->end_time);
                        $proj_hours = $proj_start_date->diffInHours($proj_end_date);
                        for($i = 0; $i < $proj_hours; $i++)
                        {
                            $proj_date = Carbon::parse($conflictAppointment->start_time)->addHours($i);
                            for($j = 0; $j < $req_hours; $j++)
                            {
                                if($j != 0 && $proj_date != $conflictAppointment->end_time)
                                {
                                    $start_date = Carbon::parse($request->date.' '.$request->start_time)->addHours($j);
                                    if($start_date == $proj_date)
                                    {
                                        $check = true;
                                        break;
                                    }
                                }
                            }
                            if($check)
                            {
                                break;
                            }
                        }
                        if($check)
                        {
                            break;
                        }
                    }
                    if(!$check)
                    {
// ---------------------------------------------------------------------------------------------------------------------------------------------
                        /*sending data to google calendar*/
                        // $event = new Event();
                        // $event->name = 'Appointment schedule';
                        // $event->startDateTime = Carbon::parse($request->date.' '. $request->start_time,'Asia/Karachi');
                        // $event->endDateTime = Carbon::parse($request->date.' '. $request->end_time,'Asia/Karachi');
                        // $eventData = $event->save();

// ---------------------------------------------------------------------------------------------------------------------------------------------

                        /*sending data to Appointments table*/
                        $schedule_appointment = new Appointments();
                        $schedule_appointment->first_name = $request->first_name;
                        $schedule_appointment->last_name = $request->last_name;
                        $schedule_appointment->email = $request->email;
                        $schedule_appointment->date = $request->date;
                        $schedule_appointment->start_time = Carbon::parse($request->date.' '.$request->start_time);
                        $schedule_appointment->end_time = Carbon::parse($request->date.' '.$request->end_time);
                        $schedule_appointment->reason = $request->reason;
                        // progress_status 0:processing    1:pending   2:completed    3:rejected
                        $schedule_appointment->progress_status = 0;
                        $schedule_appointment->appearance_status = 0;
                        // $schedule_appointment->event_id = $eventData->id;
                        $schedule_appointment->event_id = null;
                        $schedule_appointment->save();
                        // return back()->with('success','Appointment done successfully');
                        $data['assigned'] = Appointments::where('appearance_status', 0)->get();
                        $data['un_assigned'] = Appointments::where('appearance_status', 1)->get();
                        $data['canceled'] = Appointments::where('appearance_status', 2)->get();

                        // return view('admin-panel', $data)->with('success','Appointment done successfully');
                        return view('admin.assigned.assigned-list', $data)->with('success','Appointment done successfully');
                    }else {
                        return back()->with('warning','Appointment didn\'t Placed because of conflict with previous appointments');
                    }
                } else {
                    return back()->with('warning','We already have an appointment with this EMAIL which is not completed yet.');
                }
            }
        }

        //if Appointment belongs to Assigned group ----------------------------------------------------------
        if($id->appearance_status == 1)
        {
            //if Admin request to assigned the appointment 
            if($request->appearance_status == 0)
            {
                $req_start_date = Carbon::parse($request->date. ''. $request->start_time);
                $req_end_date = Carbon::parse($request->date. ''. $request->end_time);
                $req_hours = $req_start_date->diffInHours($req_end_date);
                
                $conflictAppointments = Appointments::where('date', $request->date)
                    ->where('appearance_status', 0)
                    ->where('progress_status', "!=", 2)
                    ->where('progress_status', "!=", 3)
                    ->where('email', "!=", $request->email)
                    ->get();
                $check = false;
                foreach($conflictAppointments as $conflictAppointment)
                {
                    $proj_start_date = Carbon::parse($conflictAppointment->start_time);
                    $proj_end_date = Carbon::parse($conflictAppointment->end_time);
                    $proj_hours = $proj_start_date->diffInHours($proj_end_date);
                    for($i = 0; $i < $proj_hours; $i++)
                    {
                        $proj_date = Carbon::parse($conflictAppointment->start_time)->addHours($i);
                        for($j = 0; $j < $req_hours; $j++)
                        {
                            if($j != 0 && $proj_date != $conflictAppointment->end_time)
                            {
                                $start_date = Carbon::parse($request->date.' '.$request->start_time)->addHours($j);
                                if($start_date == $proj_date)
                                {
                                    $check = true;
                                    break;
                                }
                            }
                        }
                        if($check)
                        {
                            break;
                        }
                    }
                    if($check)
                    {
                        break;
                    }
                }
                if(!$check)
                {
// ---------------------------------------------------------------------------------------------------------------------------------------------
                    /*sending data to google calendar*/
                    // $event = new Event();
                    // $event->name = 'Appointment schedule';
                    // $event->startDateTime = Carbon::parse($request->date.' '. $request->start_time,'Asia/Karachi');
                    // $event->endDateTime = Carbon::parse($request->date.' '. $request->end_time,'Asia/Karachi');
                    // $eventData = $event->save();
// ---------------------------------------------------------------------------------------------------------------------------------------------
                  
                    /*sending data to Appointments table*/
                    $schedule_appointment = $id;
                    $schedule_appointment->first_name = $request->first_name;
                    $schedule_appointment->last_name = $request->last_name;
                    $schedule_appointment->email = $request->email;
                    $schedule_appointment->date = $request->date;
                    $schedule_appointment->start_time = Carbon::parse($request->date.' '.$request->start_time);
                    $schedule_appointment->end_time = Carbon::parse($request->date.' '.$request->end_time);
                    $schedule_appointment->reason = $request->reason;
                    // progress_status 0:processing    1:pending   2:completed    3:rejected
                    $schedule_appointment->progress_status = 0;
                    $schedule_appointment->appearance_status = 0;
                    // $schedule_appointment->event_id = $eventData->id;
                    $schedule_appointment->event_id = null;
                    $schedule_appointment->save();
                    // return back()->with('success','Appointment done successfully');
                    $data['assigned'] = Appointments::where('appearance_status', 0)->get();
                    $data['un_assigned'] = Appointments::where('appearance_status', 1)->get();
                    $data['canceled'] = Appointments::where('appearance_status', 2)->get();

                    return view('admin.assigned.assigned-list', $data)->with('success','Appointment done successfully');
                }else {
                    return back()->with('warning','Appointment didn\'t Placed because of conflict with previous appointments');
                }
            }else if($request->appearance_status == 1)
            {
                $id->date = $request->date;
                $id->start_time = Carbon::parse($request->date.' '.$request->start_time);
                $id->end_time = Carbon::parse($request->date.' '.$request->end_time);
                $id->save();
                return back()->with('success','Appointment edited successfully');
            }
        }


        //if Appointment belongs to Assigned group ----------------------------------------------------------
        if($id->appearance_status == 0)
        {
            //to change the status 
            // if($id->progress_status != $request->progress_status && $request->progress_status == 2)
            if($request->progress_status == 2)
            {
                $id->event_id = null;
                $id->progress_status = 2;
                $id->save();

                $data['assigned'] = Appointments::where('appearance_status', 0)->get();
                $data['un_assigned'] = Appointments::where('appearance_status', 1)->get();
                $data['canceled'] = Appointments::where('appearance_status', 2)->get();

                return view('admin.cancelled.cancelled-list', $data)->with('success','Appointment status changed successfully');
            } else {
                if($id->date != $request->date || $id->start_time != $request->start_time || $id->end_time != $request->end_time)
                {
                    $req_start_date = Carbon::parse($request->date. ''. $request->start_time);
                    $req_end_date = Carbon::parse($request->date. ''. $request->end_time);
                    $req_hours = $req_start_date->diffInHours($req_end_date);
                    $conflictAppointments = Appointments::where('date', $request->date)
                    ->where('appearance_status', 0)
                    ->where('email', '!=', $request->email)
                    ->get();
                    $check = false;
                    foreach($conflictAppointments as $conflictAppointment)
                    {
                        $proj_start_date = Carbon::parse($conflictAppointment->start_time);
                        $proj_end_date = Carbon::parse($conflictAppointment->end_time);
                        $proj_hours = $proj_start_date->diffInHours($proj_end_date);
                        for($i = 0; $i < $proj_hours; $i++)
                        {
                            $proj_date = Carbon::parse($conflictAppointment->start_time)->addHours($i);
                            for($j = 0; $j < $req_hours; $j++)
                            {
                                if($j != 0 && $proj_date != $conflictAppointment->end_time)
                                {
                                    $start_date = Carbon::parse($request->date.' '.$request->start_time)->addHours($j);
                                    if($start_date == $proj_date)
                                    {
                                        $check = true;
                                        break;
                                    }
                                }
                            }
                            if($check)
                            {
                                break;
                            }
                        }
                        if($check)
                        {
                            break;
                        }
                    }
                    if(!$check)
                    {
// ---------------------------------------------------------------------------------------------------------------------------------------------
                        // //Deleting previous event
                        // $pre_event = Event::find($id->event_id);
                        // $pre_event->delete();
                        // /*sending data to google calendar*/
                        // $event = new Event();
                        // $event->name = 'Appointment schedule';
                        // $event->startDateTime = Carbon::parse($request->date.' '. $request->start_time,'Asia/Karachi');
                        // $event->endDateTime = Carbon::parse($request->date.' '. $request->end_time,'Asia/Karachi');
                        // $eventData = $event->save();
// ---------------------------------------------------------------------------------------------------------------------------------------------

                        /*sending data to Appointments table*/
                        $id->date = $request->date;
                        $id->start_time = Carbon::parse($request->date.' '.$request->start_time);
                        $id->end_time = Carbon::parse($request->date.' '.$request->end_time);
                        // progress_status 0:processing    1:pending   2:completed    3:rejected
                        $id->progress_status = 0;
                        $id->appearance_status = 0;
                        // $id->event_id = $eventData->id;
                        $id->event_id = null;
                        $id->save();
                        // return back()->with('success','Appointment done successfully');
                        $data['assigned'] = Appointments::where('appearance_status', 0)->get();
                        $data['un_assigned'] = Appointments::where('appearance_status', 1)->get();
                        $data['canceled'] = Appointments::where('appearance_status', 2)->get();

                        return view('admin.assigned.assigned-list', $data)->with('success','Appointment done successfully');
                    }else {
                        return back()->with('warning','Appointment didn\'t Placed because of conflict with previous appointments');
                    }
                }
            }
        }
        $data['appointment'] = $id;
        return view('admin.banners.banner-edit', $data);
    }
}
