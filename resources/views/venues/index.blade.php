@extends('layouts.app')
@section('title')
    <title>Venues</title>
@endsection

@section('content')
    <div class="container">
        <div class="col-3" style="margin-bottom:20px">
            <h1>Venues</h1>
        </div>
        <div class="row">
            @if(session()->get('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div><br/>
            @endif
        </div>

        <div class="row">

            <div class="col-12 col-md-4 col-lg-3">
                <a href="{{route('venues.create')}}" class="btn btn-primary">Add Venue</a>
            </div>
            <table class="table table-striped">
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
                </tr>
                </thead>
                <tbody>
                @foreach($venues as $venue)
                    <tr>
                        <td>
                            {{$venue->id}}
                        </td>
                        <td>
                            <a href="{{route('venues.show', $venue->id)}}">{{$venue->name}}</a>
                        </td>
                        <td>
                            {{$venue->city}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>

        <div class="row justify-content-center">
            {{ $venues->links() }}
        </div>
    </div>
@endsection


