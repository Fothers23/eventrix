<?php

namespace App\Http\Controllers;


use App\Room;
use App\Style;
use App\Venue;

use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, Venue $venue)
    {
        $styles = Style::all();
        return view('rooms.create', compact('venue','styles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Venue $venue)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $room = new Room([
            'name' => $request->get('name'),
            'total_area' => $request->get('total_area'),
            'capacity' => $request->get('capacity'),
            'venue_id' => $request->get('venue_id'),
            'style_id' => $request->get('style_id'),

        ]);
        $room->save();

        return redirect()->route('rooms.create', $venue->id)->with('success', 'Room added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model  $room
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $room = Room::findOrFail($id);
        return view('rooms.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\odel  $odel
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $room = Room::findOrFail($id);
        $styles = Style::all();
        return view('rooms.edit', compact('room','styles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Room $room)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $room->name = $request->name;
        $room->total_area = $request->total_area;
        $room->capacity = $request->capacity;
        $room->venue_id = $request->venue_id;
        $room->style_id = $request->style_id;

        $room->update();

        return redirect()->route('venues.show', $venue->id)->with('success', 'Room updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Room  $room
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room->delete();
        return redirect()->route('venues.show', $venue->id)->with('success', 'Room deleted successfully');
    }
}
