@extends('layouts.app')

@section('title')
    <title>Venues</title>
@endsection


@section('content')
    <div class="col-8">
        @if(count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(\Session::has('success'))
            <div class="alert alert-success">
                <p>{{\Session::get('success')}}</p>
            </div>
        @endif

        <div class="container">

            <div style="margin-bottom:10px">
                <h1>Add Venue</h1>
            </div>

        <form method="POST" action="{{ route('venues.store') }}"  enctype="multipart/form-data">
        {{csrf_field()}} <!-- cross-site forgery request -->
            <div class="form-group">
                <label for="name">Name: </label>
                <input type="text" class="form-control" name="name" placeholder="Input name here...">
            </div>
            <div class="form-group">
                <label for="description">Description: </label>
                <textarea class="form-control" rows="3"
                          name="description" placeholder="Input the venue's description here..."></textarea>
            </div>
            <div class="form-group">
                <label for="country_code">Country code: </label>
                <input type="text" class="form-control" name="country_code" placeholder="Input country code here...">
            </div>
            <div class="form-group">
                <label for="website_url">Website URL: </label>
                <input type="url" class="form-control" name="website_url" placeholder="Input website URL here...">
            </div>
            <div class="form-group">
                <label for="max_capacity">Max capacity: </label>
                <input type="number" class="form-control" name="max_capacity" placeholder="Input max capacity here...">
            </div>
            <div class="form-group">
                <label for="break_out_room_total">Break-out room total: </label>
                <input type="number" class="form-control" name="break_out_room_total" placeholder="Input break-out room total here...">
            </div>
            <div class="form-group">
                <label for="floor_sqm">Floor space (m<sup>2</sup>): </label>
                <input type="number" class="form-control" name="floor_sqm" placeholder="Input floor space here...">
            </div>
            <div class="form-group">
                <label for="address">Address: </label>
                <input type="text" class="form-control" name="address" placeholder="Input address here...">
            </div>
            <div class="form-group">
                <label for="city">City: </label>
                <input type="text" class="form-control" name="city" placeholder="Input city here...">
            </div>
            <div class="form-group">
                <label for="post_code">Post Code: </label>
                <input type="text" class="form-control" name="post_code" placeholder="Input post code here...">
            </div>
            <div class="form-group">
                <label for="research_notes">Research notes: </label>
                <textarea class="form-control" rows="5"
                          name="research_notes" placeholder="Input any research notes here..."></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{route('venues.index')}}" class="btn btn-primary">Back</a>
        </form>

    </div>
    </div>
@endsection
