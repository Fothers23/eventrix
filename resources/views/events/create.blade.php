@extends('layouts.app')

@section('title')
    <title>Events</title>
@endsection

@section('content')
    <div class="container">
        <div style="margin-bottom:10px">
            <h1>Add Event</h1>
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
            @if(\Session::has('success'))
                <div class="alert alert-success">
                    <p>{{\Session::get('success')}}</p>
                </div>
            @endif

            <form method="POST" action="{{ route('events.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <input type="hidden" class="form-control" name="name" value="{{ $organisation->id }}">
                </div>
                <div class="form-group">
                    <label for="name">Name: </label>
                    <input type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label for="description">Description: </label>
                    <textarea type="text" class="form-control" rows="3" name="description"></textarea>
                </div>
                <div class="form-group">
                    <label for="event_type_id">Type: </label>
                    <input type="text" class="form-control" name="event_type_id">
                </div>
                <div class="form-group">
                    <label for="organisation_id">Organisation: </label>
                    <input type="text" class="form-control" name="organisation_id">
                </div>
                <div class="form-group">
                    <label for="participants">Number of participants: </label>
                    <input type="number" class="form-control" name="participants">
                </div>
                <div class="form-group">
                    <label for="start_date">Start Date: </label>
                    <input type="date" class="form-control" name="start_date">
                </div>
                <div class="form-group">
                    <label for="end_date">End Date: </label>
                    <input type="date" class="form-control" name="end_date">
                </div>
                <div class="form-group">
                    <label for="event_status_id">Status: </label>
                    <input type="text" class="form-control" name="event_status_id">
                </div>
                <div class="form-group">
                    <label for="venue_id">Venue: </label>
                    <input type="text" class="form-control" name="venue_id">
                </div>
                <div class="form-group">
                    <label for="research_notes">Research notes: </label>
                    <textarea type="text" class="form-control" rows="5" name="research_notes"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('organisations.index')}}" class="btn btn-primary">Back</a>
            </form>
        </div>
    </div
@endsection
