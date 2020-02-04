@extends('layouts.app')

@section('title')
    <title>Organisations</title>
@endsection

@section('content')
    <div class="container">
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
        <div class="row justify-content-center">
            {{ $organisations->links() }}
        </div>
    </div>

@endsection
