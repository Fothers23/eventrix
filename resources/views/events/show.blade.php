@extends('layouts.app')

@section('title')
    <title>{{$event->name}}</title>
@endsection

@section('content')
    <div class="container">
        <h1>{{$event->name}}</h1>
        <div class="col-12">
            <p><b>Description: </b>{{$event->description}}</p>
            <p><b>Type: </b>{{$event->eventType->name}}</p>
            <p><b>Organisation: </b>{{$event->organisation->name}}</p>
            <p><b>Number of Participants: </b>{{$event->participants}}</p>
            <p><b>Start date: </b>{{$event->start_date}}</p>
            <p><b>End date: </b>{{$event->end_date}}</p>
            <p><b>Status: </b>{{$event->eventStatus->status}}</p>
            <p><b>Venue: </b>{{$event->venue->name}}</p>
            <p><b>Research Notes: </b>{{$event->research_notes}}</p>
        </div>
        <div class="row">
            <a href="{{route('events.index')}}" class="btn btn-primary">Back</a>
            <a href="{{route('events.edit', $event->id)}}" class="btn btn-warning">Edit</a>
            <form action="{{ route('events.destroy', $event->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete</button>
            </form>
        </div>
    </div>

@endsection
