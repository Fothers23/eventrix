@extends('layouts.app')

@section('title')
    <title>Events</title>
@endsection

@section('content')
    <div class="container">
        <div style="margin-bottom:10px">
            <h1>Update Event</h1>
        </div>
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

            <form method="POST" action="{{ route('events.update', $event->id) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                @if($event->organisation != null)
                    <input type="hidden" class="form-control" name="organisation_id" value="{{ $event->organisation->id }}">
                @endif
                </div>
                <div class="form-group">
                    <label for="name">Name: </label>
                    <input type="text" class="form-control" name="name" value="{{ old('name', $event->name) }}">
                </div>
                <div class="form-group">
                    <label for="description">Description: </label>
                    <textarea type="text" class="form-control" rows="3"
                              name="description">{{ old('description', $event->description) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="event_type_id">Type: </label>
                    <select type="text" class="form-control" name="event_type_id">
                        @if($event->eventType != null)
                        <option
                            value="{{ old('event_type_id', $event->event_type_id) }}">{{ old('event_type_id', $event->eventType->name) }}</option>
                        @endif
                        @foreach ($eventTypes as $eventType)
                            <option value="{{ $eventType->id }}">{{ $eventType->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="organisation_id">Organisation: </label>
                    <select type="text" class="form-control" name="organisation_id">
                        @if($event->organisation != null)
                        <option
                            value="{{ old('organisation_id', $event->organisation_id) }}">{{ old('organisation_id', $event->organisation->name) }}</option>
                        @endif
                        @foreach ($organisations as $organisation)
                            <option value="{{ $organisation->id }}">{{ $organisation->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="participants">Number of participants: </label>
                    <input type="number" class="form-control" name="participants"
                           value="{{ old('participants', $event->participants) }}">
                </div>
                <div class="form-group">
                    <label for="start_date">Start Date: </label>
                    <input type="datetime-local" class="form-control" name="start_date"
                           value="{{ old('start_date', $event->start_date) }}">
                </div>
                <div class="form-group">
                    <label for="end_date">End Date: </label>
                    <input type="datetime-local" class="form-control" name="end_date"
                           value="{{ old('end_date', $event->end_date) }}">
                </div>
                <div class="form-group">
                    <label for="event_status_id">Status: </label>
                    <select type="text" class="form-control" name="event_status_id">
                        @if($event->eventStatus != null)
                        <option
                            value="{{ old('event_status_id', $event->event_status_id) }}">{{ old('event_status_id', $event->eventStatus->status) }}</option>
                        @endif
                        <option value="1">Past</option>
                        <option value="2">Tender</option>
                        <option value="3">Upcoming</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="venue_id">Venue: </label>
                    <select type="text" class="form-control" name="venue_id">
                        @if($event->venue != null)
                        <option
                            value="{{ old('venue_id', $event->venue_id) }}">{{ old('venue_id', $event->venue->name) }}</option>
                        @endif
                        @foreach ($venues as $venue)
                            <option value="{{ $venue->id }}">{{ $venue->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="research_notes">Research notes: </label>
                    <textarea type="text" class="form-control" rows="5"
                              name="research_notes">{{ old('research_notes', $event->research_notes) }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('organisations.show', $organisation->id)}}" class="btn btn-primary">Back</a>
            </form>
        </div>
    </div>
@endsection
