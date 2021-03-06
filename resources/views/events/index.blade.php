@extends('layouts.app')
@section('title')
    <link href="{{ asset('styles/backToTopBtn.css') }}" rel="stylesheet">

    <title>Events</title>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3" style="margin-bottom:20px">
                <h1>Events</h1>
            </div>

            <div class="col-9">
                <form class="form-inline">
                    <div class="form-group">
                        <input class="form-control" type="search" name="q" placeholder="Search here...">
                    </div>
                    <button type="submit" class="btn btn-primary">Search</button>
                </form>
            </div>
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

        <button onclick="topFunction()" id="myBtn" title="Go to top">Back to top</button>

        <div class="row justify-content-center">
            {{ $events->links() }}
        </div>
    </div>


    {{--    TODO PUT IN ITS OWN JS FILE, INSIDE - /RESOURCES/JS - USED IN EVENTS/ORGS/VENUES INDEX & ORGS SHOW --}}
    <script>
        //Get the button:
        mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {scrollFunction()};

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0; // For Safari
            document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
        }
    </script>
@endsection


