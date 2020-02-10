@extends('layouts.app')

@section('title')
    <title>{{$room->name}}</title>
@endsection

@section('content')
    <div class="container">
        <h1>{{$room->name}}</h1>
        <div class="col-12">
            <p><b>Total Area: </b>{{$room->total_area}}</p>
            @if($room->style != null)
                <p><b>Style: </b>{{$room->style->name}}</p>
            @endif
            <p><b>Capacity: </b>{{$room->capacity}}</p>
        </div>
        <div class="row">
            <a href="{{route('venues.show', $room->venue->id)}}" class="btn btn-primary">Back</a>
            @auth
                <a href="{{route('rooms.edit', $room->id)}}" class="btn btn-warning">Edit</a>
                <form action="{{ route('rooms.destroy', $room->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            @endauth
        </div>
    </div>

@endsection
