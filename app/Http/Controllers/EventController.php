<?php

namespace App\Http\Controllers;

use App\Event;
use App\EventType;
use App\Organisation;
use App\Venue;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $events = Event::paginate(25);
        return view('events.index', compact('events'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Request $request
     * @param Organisation $organisation
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create(Request $request, Organisation $organisation)
    {
        $eventTypes = EventType::all();
        $organisations = Organisation::all();
        $venues = Venue::all();
        return view('events.create', compact('organisation', 'eventTypes', 'organisations', 'venues'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request, Organisation $organisation)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $event = new Event([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'event_type_id' => $request->get('event_type_id'),
            'organisation_id' => $request->get('organisation_id'),
            'participants' => $request->get('participants'),
            'research_notes' => $request->get('research_notes'),
            'start_date' => $request->get('start_date'),
            'end_date' => $request->get('end_date'),
            'event_status_id' => $request->get('event_status_id'),
            'venue_id' => $request->get('venue_id'),
            'user_id' => $request->get('user_id'),
            'location' => $request->get('location')
        ]);
        $event->save();

        return redirect()->route('events.create', $organisation->id)->with('success','Event added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $event = Event::findOrFail($id);
        return view('events.show', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $eventTypes = EventType::all();
        $organisations = Organisation::all();
        $venues = Venue::all();
        return view('events.edit', compact('event', 'eventTypes', 'organisations', 'venues'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Event  $event
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, Event $event)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $event->name = $request->name;
        $event->description = $request->description;
        $event->event_type_id = $request->event_type_id;
        $event->participants = $request->participants;
        $event->research_notes = $request->research_notes;
        $event->start_date = $request->start_date;
        $event->end_date = $request->end_date;
        $event->event_status_id = $request->event_status_id;
        $event->venue_id = $request->venue_id;
        $event->location = $request->location;

        $event->update();

        return redirect()->route('events.index')->with('success','Event updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Event  $event
     * @return \Illuminate\Http\Response
     */
    public function destroy(Event $event)
    {
        $event->delete();

        return redirect()->route('events.index')->with('success','Event deleted successfully');
    }
}
