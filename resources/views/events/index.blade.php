@extends('layouts.app')
@section('title')
    <title>Events</title>
@endsection

@section('content')
    <div class="container">
        <div class="col-3" style="margin-bottom:20px">
            <h1>Events</h1>
        </div>
        <div class="row">
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div><br/>
            @endif
        </div>

        <div class="row justify-content-center">
            {{ $events->links() }}
        </div>
        <div class="row">
            <table class="table">
                <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Name
                    </th>
                    <th>
                        Location
                    </th>
                    <th>
                        Hosting Venue
                    </th>
                    <th>
                        Organisation
                    </th>
                    <th>
                        Start Date
                    </th>
                    <th>
                        End Date
                    </th>
                    <th>Submitted by</th>
                </tr>
                </thead>
                <tbody>
                @foreach($events as $event)
                    <tr>
                        <td>
                            {{$event->id}}
                        </td>
                        <td>
                            <a href="{{route('events.show', $event->id)}}">{{$event->name}}</a>
                        </td>
                        <td>
                            {{$event->location}}
                        </td>
                        <td>
                            @if($event->venue != null)
                                <a href="{{route('venues.show', $event->venue->id)}}">{{$event->venue->name}}</a>
                            @endif
                        </td>
                        <td>
                            @if($event->organisation != null)
                                <a href="{{route('organisations.show', $event->organisation->id)}}">{{$event->organisation->name}}</a>
                            @endif
                        </td>
                        <td>{{$event->start_date}}</td>
                        <td>{{$event->end_date}}</td>
                        <td>{{$event->user->name}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

        <div class="row justify-content-center">
            {{ $events->links() }}
        </div>
    </div>
@endsection


