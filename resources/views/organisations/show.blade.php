@extends('layouts.app')

@section('title')
    <title>{{$organisation->name}}</title>
@endsection

@section('content')
    <div class="container">
        <h1>{{$organisation->name}}</h1>
        <div class="col-12">
            <p><b>Description: </b>{{$organisation->description}}</p>
            <p><b>Number of members: </b>{{$organisation->member_total}}</p>
            <p><b>Year Founded: </b>{{$organisation->year_founded}}</p>
            <p><b>Website: </b>{{$organisation->website_url}}</p>
            <p><b>SIC Division: </b>{{$organisation->sic_division_id}}</p>
            <p><b>City: </b>{{$organisation->city}}</p>
            <p><b>Post Code: </b>{{$organisation->post_code}}</p>
            <p><b>Contact name: </b>{{$organisation->contact_name}}</p>
            <p><b>Contact email: </b>{{$organisation->contact_email}}</p>
            <p><b>Contact phone number: </b>{{$organisation->contact_phone}}</p>
            <p><b>Research Notes: </b>{{$organisation->research_notes}}</p>
            <div class="row">
                <a href="{{route('organisations.index')}}" class="btn btn-primary">Back</a>
                <a href="{{route('organisations.edit', $organisation->id)}}" class="btn btn-warning">Edit</a>
                <form action="{{ route('organisations.destroy', $organisation->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </div>
        </div>
        <hr>
        <div class="col-12 col-md-4 col-lg-3">
            <a href="{{route('events.create', $organisation->id)}}" class="btn btn-primary">Add Organisation's event</a>
        </div>
        <table class="table">
            <thead>
            <tr>
                <th>
                    ID
                </th>
                <th>
                    Event Name
                </th>
                <th>
                    Event Location
                </th>
                <th>
                    Hosting Venue
                </th>
                <th>
                    Start Date
                </th>
                <th>
                    End Date
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($organisation->events as $event)
                <tr>
                    <td>
                        {{$event->id}}
                    </td>
                    <td>
                        <a href="{{route('events.show', $event->id)}}">{{$event->name}}</a>
                    </td>
                    <td>
                        {{$event->city}}
                    </td>
                    <th>
                        {{$event->venue->name}}
                    </th>
                    <th>
                        {{$event->start_date}}
                    </th>
                    <th>
                        {{$event->end_date}}
                    </th>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
