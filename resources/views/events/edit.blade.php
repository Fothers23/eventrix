@extends('layouts.app')

@section('title')
    <title>Events</title>
@endsection

@section('header')
    <div style="margin-bottom:10px">
        <h1>Add Event</h1>
    </div>
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

        <form method="POST" action="{{ route('events.update', $event->id) }}"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name: </label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $event->name) }}">
            </div>
            <div class="form-group">
                <label for="description">Description: </label>
                <textarea type="text" class="form-control" rows="3"
                          name="description" value="{{ old('description', $event->description) }}"></textarea>
            </div>
            <div class="form-group">
                <label for="event_types_id">Type: </label>
                <input type="text" class="form-control" name="event_types_id" value="{{ old('event_types_id', $event->eventType()->name) }}">
            </div>
            <div class="form-group">
                <label for="organisations_id">Organisation: </label>
                <input type="text" class="form-control" name="organisations_id" value="{{ old('organisations_id', $event->organisation()->name) }}">
            </div>
            <div class="form-group">
                <label for="participants">Number of participants: </label>
                <input type="number" class="form-control" name="participants" value="{{ old('participants', $event->participants) }}">
            </div>
            <div class="form-group">
                <label for="start_date">Start Date: </label>
                <input type="date" class="form-control" name="start_date" value="{{ old('start_date', $event->start_date) }}">
            </div>
            <div class="form-group">
                <label for="end_date">End Date: </label>
                <input type="date" class="form-control" name="end_date" value="{{ old('end_date', $event->end_date) }}">
            </div>
            <div class="form-group">
                <label for="event_status_id">Status: </label>
                <input type="text" class="form-control" name="event_status_id" value="{{ old('event_status_id', $event->eventStatus()->status) }}">
            </div>
            <div class="form-group">
                <label for="venue_id">Venue: </label>
                <input type="text" class="form-control" name="venue_id" value="{{ old('venue_id', $event->venue()->name) }}">
            </div>
            <div class="form-group">
                <label for="research_notes">Research notes: </label>
                <textarea type="text" class="form-control" rows="5"
                          name="research_notes" value="{{ old('research_notes', $event->research_notes) }}"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{route('venues.index')}}" class="btn btn-primary">Back</a>
        </form>
    </div>
@endsection
