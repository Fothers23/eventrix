<?php

namespace App\Http\Controllers;

use App\Venue;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VenueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(Request $request)
    {
        $query = Venue::orderBy('name', 'asc');

        // Filters index based on Organisation name and User name
        if ($searchTerm = $request->query('q'))
        {
            $query->where('name', 'LIKE', "%{$searchTerm}%")->orWhereHas('user', function (Builder $subquery) use ($searchTerm) {
                $subquery->where('name', 'LIKE', "%{$searchTerm}%");
            });
        }

        $venues = $query->paginate(25);

        return view('venues.index', compact('venues'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('venues.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'website_url' => 'required',
        ]);

        $venue = new Venue([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'country_code' => $request->get('country_code'),
            'website_url' => $request->get('website_url'),
            'max_capacity' => $request->get('max_capacity'),
            'break_out_room_total' => $request->get('break_out_room_total'),
            'floor_sqm' => $request->get('floor_sqm'),
            'address'=> $request->get('address'),
            'city' => $request->get('city'),
            'post_code' => $request->get('post_code'),
            'research_notes' => $request->get('research_notes'),
            'user_id' => $request->get('user_id'),
            'email' => $request->get('email'),
            'phone_number' => $request->get('phone_number')
        ]);

        $venue->save();

        return redirect(route('venues.create'))->with('success', 'Data added');
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $venue = Venue::findOrFail($id);
        return view('venues.show', compact('venue'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $venue = Venue::findOrFail($id);
        return view('venues.edit', compact('venue'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venue $venue)
    {
        $this->validate($request, [
            'name' => 'required',
            'website_url' => 'required',
        ]);

        $venue->name = $request->name;
        $venue->description = $request->description;
        $venue->country_code = $request->country_code;
        $venue->website_url = $request->website_url;
        $venue->max_capacity = $request->max_capacity;
        $venue->break_out_room_total = $request->break_out_room_total;
        $venue->floor_sqm = $request->floor_sqm;
        $venue->address = $request->address;
        $venue->city = $request->city;
        $venue->post_code = $request->post_code;
        $venue->research_notes = $request->research_notes;
        $venue->email = $request->email;
        $venue->phone_number = $request->phone_number;

        $venue->update();

        return redirect()->route('venues.index')->with('success','Venue updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Venue  $venue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venue $venue)
    {
        $venue->delete();

        return redirect()->route('venues.index')->with('success','Venue deleted successfully');
    }
}
