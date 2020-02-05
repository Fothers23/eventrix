@extends('layouts.app')

@section('title')
    <link href="{{ asset('styles/backToTopBtn.css') }}" rel="stylesheet">

    <title>{{$organisation->name}}</title>
@endsection

@section('content')
    <div class="container">
        <h1>{{$organisation->name}}</h1>
        <div class="col-12">
            <p><b>Description: </b>{{$organisation->description}}</p>
            <p><b>Number of members: </b>{{$organisation->member_total}}</p>
            <p><b>Year Founded: </b>{{$organisation->year_founded}}</p>
            <p><b>Website: </b><a href="{{$organisation->website_url}}"
                                  target="_blank">{{$organisation->website_url}}</a></p>
            @if($organisation->sicDivision != null)
                <p><b>SIC Division: </b>{{$organisation->sicDivision->name}}</p>
            @endif
            <p><b>Address: </b>{{$organisation->address}}</p>
            <p><b>City: </b>{{$organisation->city}}</p>
            <p><b>Post Code: </b>{{$organisation->postcode}}</p>
            <p><b>Contact name: </b>{{$organisation->contact_name}}</p>
            <p><b>Contact email: </b>{{$organisation->contact_email}}</p>
            <p><b>Contact phone number: </b>{{$organisation->contact_phone}}</p>
            <p><b>Research Notes: </b>{{$organisation->research_notes}}</p>
            <div class="row">
                <a href="{{route('organisations.index')}}" class="btn btn-primary">Back</a>
                @auth
                    <a href="{{route('organisations.edit', $organisation->id)}}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('organisations.destroy', $organisation->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                @endauth
            </div>
        </div>
        <hr>
        <div class="col-12 col-md-4 col-lg-3">
            @auth
                <a href="{{route('events.create', $organisation->id)}}" class="btn btn-primary">Add Organisation's
                    event</a>
            @endauth
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
                <th>Submitted by</th>
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
                        {{$event->location}}
                    </td>
                    <td>
                        @if($event->venue != null)
                            {{$event->venue->name}}
                        @endif
                    </td>

                    <td>
                        {{$event->start_date}}
                    </td>
                    <td>
                        {{$event->end_date}}
                    </td>
                    <td>{{$event->user->name}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <button onclick="topFunction()" id="myBtn" title="Go to top">Back to top</button>

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
