@extends('layouts.app')

@section('title')
    <title>{{$venue->name}}</title>
@endsection

@section('content')
    <div class="container">
        <h1>{{$venue->name}}</h1>
        <div class="col-12">
            <p><b>Description: </b>{{$venue->description}}</p>
            <p><b>Max Capacity: </b>{{$venue->max_capacity}}</p>
            <p><b>Number of break out rooms: </b>{{$venue->break_out_room_total}}</p>
            <p><b>Floor space (m<sup>2</sup>): </b>{{$venue->floor_sqm}}</p>
            <p><b>Website: </b><a href="{{$venue->website_url}}" target="_blank">{{$venue->website_url}}</a></p>
            <hr>
            <p><b>Country Code: </b>{{$venue->country_code}}</p>
            <p><b>Address: </b>{{$venue->address}}</p>
            <p><b>City: </b>{{$venue->city}}</p>
            <p><b>Post Code: </b>{{$venue->post_code}}</p>
            <p><b>Research Notes: </b>{{$venue->research_notes}}</p>
            <div class="row">
                <a href="{{route('venues.index')}}" class="btn btn-primary">Back</a>
                <a href="{{route('venues.edit', $venue->id)}}" class="btn btn-warning">Edit</a>
                <form action="{{ route('venues.destroy', $venue->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </div>
        </div>
    </div>
@endsection
