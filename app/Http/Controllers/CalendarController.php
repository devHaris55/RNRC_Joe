<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Appointments;
use App\Models\CalendarEvents;
use Spatie\GoogleCalendar\Event;
use Illuminate\Support\Facades\Redirect;

class CalendarController extends Controller
{
    public function index()
    {
        $calendars = CalendarEvents::where('status', 0)->get();
        return view('admin.calendar.calendar-list', compact('calendars'));
    }
    public function add_calendar()
    {
        return view('admin.calendar.calendar-add');
    }
    public function update_calendar(Request $request)
    {
        /*sending data to google calendar*/
        $event = new Event();
        $event->name = $request->title;
        $event->description = $request->description;
        // $event->startDateTime = Carbon::parse($request->date,'Asia/Karachi');
        // $event->endDateTime = Carbon::parse($request->date,'Asia/Karachi');
        // $event->endDateTime = Carbon::parse($conflictAppointment->start_time)->addDay();

        // $event->startDate = Carbon::parse($request->date.' '. $request->start_time,'America/Los_Angeles');
        $event->startDate = Carbon::parse($request->date.' '. $request->start_time,'Asia/Karachi');
        $event->endDate = Carbon::parse($request->date.' '. $request->end_time,'Asia/Karachi');

        $eventData = $event->save();

        $calendar_event = new CalendarEvents();
        $calendar_event->title = $request->title;
        $calendar_event->description = $request->description;
        $calendar_event->date = $eventData->startDate;;
        $calendar_event->event_id = $eventData->id;
        $calendar_event->status = 0;
        $calendar_event->save();

        return Redirect::route('admin_calendar')->with('success','Event created successfully');
        return Redirect::back()->with('success','Event created successfully');

        return view('admin.calendar.calendar-list', compact('calendars'))->with('success','Event created successfully');
    }
    public function delete_calendar($id)
    {
        $calendar_event = CalendarEvents::find($id);
        $calendar_event->status = 1;

        $event = Event::find($calendar_event->event_id);
        $event->delete();

        $calendar_event->save();
        
        return back()->with('error','Event deleted successfully');
        // return Redirect::route('admin_calendar')->with('error','Event deleted successfully');
        // return view('admin.calendar.calendar-list', compact('calendars'))->with('error','Event deleted successfully');
    }
}
