<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Appointments;
use App\Models\CalendarEvents;
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
        $data['assigned'] = Appointments::with('getevent')->where('appearance_status', 0)->orderBy('date', 'desc')->get();

        return view('admin.assigned.assigned-list', $data);
    }
    public function rejectedIndex()
    {
        $data['assigned'] = Appointments::with('getevent')->where('appearance_status', 1)->orderBy('date', 'desc')->get();

        return view('admin.assigned.rejected-list', $data);
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
        // Appointments -> Conflict Request
        return view('admin.cancelled.cancelled-list', $data)->with('error', 'Conflict Request Cancelled successfully');
    }

    public function appointment_edit(Appointments $id)
    {
        $event = CalendarEvents::where('status', 1)->get();
        $data['event'] = $event;
        if ($id->form_type == 1) {
            $data['appointment'] = $id;
            //To select the value in dropdown
            $data['start_time'] = explode(' ', $id->start_time);
            $data['end_time'] = explode(' ', $id->end_time);
            return view('admin.assigned.assigned-edit', $data)->with('success', 'Conflict Request Edited successfully');
        }
        if ($id->form_type == 2) {

            $data['appointment'] = $id;
            return view('admin.assigned.full-assigned-edit', $data)->with('success', 'Conflict Request Edited successfully');
        }
        if ($id->form_type == 3) {

            $data['appointment'] = $id;
            $data['start_time'] = explode(' ', $id->start_time);
            $data['end_time'] = explode(' ', $id->end_time);
            return view('admin.assigned.recur-assigned-edit', $data)->with('success', 'Conflict Request Edited successfully');
        }
    }

    public function update_appointment(Request $request, Appointments $id)
    {


        //if Appointment belongs to Canceled appointment ----------------------------------------------------------
        if ($id->form_type == 1) {

            $req_start_date = Carbon::parse($request->date . '' . $request->start_time);
            $req_end_date = Carbon::parse($request->date . '' . $request->end_time);
            $req_hours = $req_start_date->diffInHours($req_end_date);
            /*sending data to Appointments table*/
            $id->first_name = $request->first_name;
            $id->last_name = $request->last_name;
            $id->email = $request->email;
            $id->date = $request->date;
            $id->start_time = Carbon::parse($request->date . ' ' . $request->start_time);
            $id->end_time = Carbon::parse($request->date . ' ' . $request->end_time);
            $id->reason = $request->reason;
            $id->appearance_status = $request->appearance_status;
            $id->event_id = $request->event_id;
            $id->form_type = $request->form_type;
            $id->password = $request->password;
            $id->save();
            return back()->with('success', 'Conflict Request Edited successfully');
        }
        if ($id->form_type == 2) {


            /*sending data to Appointments table*/
            $id->first_name = $request->first_name;
            $id->last_name = $request->last_name;
            $id->email = $request->email;
            $id->date = $request->date;
            $id->reason = $request->reason;
            $id->appearance_status = $request->appearance_status;
            $id->event_id = $request->event_id;
            $id->form_type = $request->form_type;
            $id->save();

            return back()->with('success', 'Conflict Request Edited successfully');
        } else if ($id->form_type == 3) {
            $req_start_date = Carbon::parse($request->date . '' . $request->start_time);
            $req_end_date = Carbon::parse($request->date . '' . $request->end_time);
            $req_hours = $req_start_date->diffInHours($req_end_date);
            /*sending data to Appointments table*/
            $id->first_name = $request->first_name;
            $id->last_name = $request->last_name;
            $id->email = $request->email;
            $id->start_date = $request->start_date;
            $id->end_date = $request->end_date;
            $id->event_occur = $request->event_occur;
            $id->start_time = Carbon::parse($request->date . ' ' . $request->start_time);
            $id->end_time = Carbon::parse($request->date . ' ' . $request->end_time);
            $id->reason = $request->reason;
            $id->appearance_status = $request->appearance_status;
            $id->event_id = $request->event_id;;
            $id->form_type = $request->form_type;
            $id->save();
            return back()->with('success', 'Conflict Request Edited successfully');
        } else {
            return back()->with('warning', 'We already have an Conflict Request with this EMAIL which is not completed yet.');
        }
    }
}