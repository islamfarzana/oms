<?php

namespace App\Http\Controllers;

use App\Event;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    public function index()
    {
        if (request()->ajax()) {
            $data = Event::latest()->get(['id', 'title', 'start', 'end', 'backgroundColor']);
            return response()->json($data);
        }
        return view('calendar');
    }

    public function create(Request $request, Event $event)
    {
        $event->title = $request->title;
        $event->start = $request->start;
        $event->end = $request->end;
        $event->save();
        return redirect()->route('calendar')->with('success_message', 'Event was successfully added');
    }

    public function update(Request $request)
    {
        $where = array('id' => $request->id);
        $updateArr = ['title' => $request->title, 'start' => $request->start, 'end' => $request->end];
        $event  = Event::where($where)->update($updateArr);

        return response()->json($event);
    }

    public function destroy(Request $request)
    {
        $event = Event::where('id', $request->id)->delete();

        return response()->json($event);
    }
}
