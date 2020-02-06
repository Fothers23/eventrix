@extends('layouts.app')

@section('title')
    <link href="{{ asset('styles/backToTopBtn.css') }}" rel="stylesheet">

    <title>Organisations</title>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-3" style="margin-bottom:20px">
                <h1>Organisations</h1>
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

        @if(session()->get('success'))

            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div><br/>
        @endif
        @auth
            <a href="{{ route('organisations.create') }}" class="btn btn-success">Add organisation</a>
        @endauth
        <div class="row justify-content-center">
            {{ $organisations->links() }}
        </div>
        <table class="table table-striped">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Location</th>
                <th>Number of Events</th>
                <th>Year Founded</th>
                <th>Submitted by</th>
            </tr>
            </thead>
            <tbody>

            @foreach($organisations as $organisation)
                <tr>
                    <td>{{ $organisation->id }}</td>
                    <td><a href="{{route('organisations.show', $organisation->id)}}">{{$organisation->name}}</a></td>
                    <td>{{ $organisation->city }}</td>
                    <td>{{ $organisation->numOfEvents() }}</td>
                    <td>{{ $organisation->year_founded }}</td>
                    <td>{{$organisation->user->name}}</td>
                    @auth
                        <td>
                            <a href="{{route('organisations.edit', $organisation->id)}}"
                               class="btn btn-warning">Edit</a>
                        </td>
                        <td>
                            <form action="{{ route('organisations.destroy', $organisation->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </td>
                    @endauth
                </tr>
            @endforeach
            </tbody>
        </table>

        <button onclick="topFunction()" id="myBtn" title="Go to top">Back to top</button>

        <div class="row justify-content-center">
            {{ $organisations->links() }}
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
