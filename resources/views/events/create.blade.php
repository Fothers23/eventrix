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

            <form method="POST" action="{{ route('organisations.events.store', $organisation->id) }}">
                @csrf
                <div class="form-group"> <!-- hidden inputs -->
                    <input type="hidden" class="form-control" name="organisation_id" value="{{ $organisation->id }}">
                    <input type="hidden" class="form-control" name="user_id" value="{{Auth::user()->id}}">
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
                    <input id="search" name="search" type="text" placeholder="Search" onkeyup="filter(this.value, 'select')">
                    <select id="select" type="text" class="form-control" name="event_type_id" size="5">
                        @foreach ($eventTypes as $eventType)
                            <option value="{{ $eventType->id }}">{{ $eventType->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="participants">Number of participants: </label>
                    <input type="number" class="form-control" name="participants">
                </div>
                <div class="form-group">
                    <label for="start_date">Start Date: </label>
                    <input type="datetime-local" class="form-control" name="start_date">
                </div>
                <div class="form-group">
                    <label for="end_date">End Date: </label>
                    <input type="datetime-local" class="form-control" name="end_date">
                </div>
                <div class="form-group">
                    <label for="event_status_id">Status: </label>
                    <select type="text" class="form-control" name="event_status_id">
                        <option value=""> -- Select One --</option>
                        <option value="1">Past</option>
                        <option value="2">Tender</option>
                        <option value="3">Upcoming</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="venue_id">Venue: </label>
                    <input id="search1" type="text"  name="search" placeholder="Search" onkeyup="filter(this.value, 'select1')">
                    <select  id="select1" size="5" type="text" class="form-control" name="venue_id">
                        @foreach ($venues as $venue)
                            <option value="{{ $venue->id }}">{{ $venue->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="research_notes">Research notes: </label>
                    <textarea type="text" class="form-control" rows="5" name="research_notes"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('organisations.show', $organisation->id)}}" class="btn btn-primary">Back</a>
            </form>
        </div>
    </div>

    <script>
        function filter(keyword, emilyIsANonceId) {
            var select = document.getElementById(emilyIsANonceId);
            for (var i = 0; i < select.length; i++) {
                var txt = select.options[i].text;
                var include = txt.toLowerCase().includes(keyword.toLowerCase());
                select.options[i].style.display = include ? '':'none';
            }
        }
    </script>
@endsection
