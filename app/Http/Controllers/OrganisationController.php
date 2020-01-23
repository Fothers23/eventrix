<?php

namespace App\Http\Controllers;

use App\SicDivision;
use Illuminate\Http\Request;
use App\Organisation;

class OrganisationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $organisations = Organisation::all();

        return view('organisations.index',compact('organisations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $sicDivisions = SicDivision::all();
        return view('organisations.create', compact('sicDivisions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            // 'member_total' => 'required',
            // 'year_founded' => 'required',
            'website_url' => 'required',
            // 'sic_divisions_id' => 'required',
            // 'city' => 'required',
            // 'address' => 'required',
            // 'postcode'=> 'required',
            // 'contact_name' => 'required',
            // 'contact_email' => 'required',
            // 'contact_phone' => 'required',

        ]);

        $organisation = new Organisation([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'member_total' => $request->get('member_total'),
            'year_founded' => $request->get('year_founded'),
            'website_url' => $request->get('website_url'),
            'sic_division_id'=> $request->get('sic_division_id'),
            'address'=> $request->get('address'),
            'city'=> $request->get('city'),
            'postcode' => $request->get('postcode'),
            'contact_name' => $request->get('contact_name'),
            'contact_email' => $request->get('contact_email'),
            'contact_phone' => $request->get('contact_phone'),
            'research_notes' => $request->get('research_notes'),
            'user_id' => $request->get('user_id')
        ]);

        $organisation->save();

        return redirect('/organisations')->with('success', 'Organisation has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model  $Model
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $organisation = Organisation::findOrFail($id);

        return view('/organisations/show', compact('organisation'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model  $Model
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $organisation = Organisation::findOrFail($id);
        $sicDivisions = SicDivision::all();
        return view('organisations.edit', compact('organisation', 'sicDivisions'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model  $Model
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required',
            // 'member_total' => 'required',
            // 'year_founded' => 'required',
            'website_url' => 'required',
            // 'sic_divisions_id' => 'required',
            // 'city' => 'required',
            // 'postcode'=> 'required',
            // 'contact_name' => 'required',
            // 'contact_email' => 'required',
            // 'contact_phone' => 'required',

        ]);

        $organisation = Organisation::find($id);
        $organisation->name = $request->get('name');
        $organisation->description = $request->get('description');
        $organisation->member_total = $request->get('member_total');
        $organisation->year_founded = $request->get('year_founded');
        $organisation->website_url = $request->get('website_url');
        $organisation->sic_division_id = $request->get('sic_division_id');
        $organisation->address= $request->get('address');
        $organisation->city = $request->get('city');
        $organisation->postcode = $request->get('postcode');
        $organisation->contact_name = $request->get('contact_name');
        $organisation->contact_email = $request->get('contact_email');
        $organisation->contact_phone = $request->get('contact_phone');
        $organisation->research_notes = $request->get('research_notes');
        $organisation->update();

        return redirect('/organisations')->with('success', 'Organisation has been updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model  $Model
     * @return \Illuminate\Http\Response
     */
    public function destroy(Organisation $organisation)
    {
        $organisation->delete();

        return redirect('/organisations')->with('success','Organisation has been deleted!');
    }
}
