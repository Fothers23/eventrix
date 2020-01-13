@extends('layouts.app')

@section('title')
    <title>Venues</title>
@endsection

@section('header')
    <div style="margin-bottom:10px">
        <h1>Add Venue</h1>
    </div>
@endsection

@section('content')
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

        <form method="POST" action="{{ route('venues.update', $venue->id) }}"  enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Name: </label>
                <input type="text" class="form-control" name="name" value="{{ old('name', $venue->name) }}">
            </div>
            <div class="form-group">
                <label for="description">Description: </label>
                <textarea class="form-control" rows="3"
                          name="description" value="{{ old('description', $venue->description) }}"></textarea>
            </div>
            <div class="form-group">
                <label for="country_code">Country code: </label>
                <input type="text" class="form-control" name="country_code" value="{{ old('country_code', $venue->country_code) }}">
            </div>
            <div class="form-group">
                <label for="website_url">Website URL: </label>
                <input type="url" class="form-control" name="website_url" value="{{ old('website_url', $venue->website_url) }}">
            </div>
            <div class="form-group">
                <label for="max_capacity">Max capacity: </label>
                <input type="number" class="form-control" name="max_capacity" value="{{ old('max_capacity', $venue->max_capacity) }}">
            </div>
            <div class="form-group">
                <label for="break_out_room_total">Break-out room total: </label>
                <input type="number" class="form-control" name="break_out_room_total" value="{{ old('break_out_room_total', $venue->break_out_room_total) }}">
            </div>
            <div class="form-group">
                <label for="floor_sqm">Floor space (squared metres): </label>
                <input type="number" class="form-control" name="floor_sqm" value="{{ old('floor_sqm', $venue->floor_sqm) }}">
            </div>
            <div class="form-group">
                <label for="city">City: </label>
                <input type="text" class="form-control" name="city" value="{{ old('city', $venue->city) }}">
            </div>
            <div class="form-group">
                <label for="post_code">City: </label>
                <input type="text" class="form-control" name="post_code" value="{{ old('post_code', $venue->post_code) }}">
            </div>
            <div class="form-group">
                <label for="research_notes">Research notes: </label>
                <textarea class="form-control" rows="5"
                          name="research_notes" value="{{ old('research_notes', $venue->research_notes) }}"></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            <a href="{{route('venues.index')}}" class="btn btn-primary">Back</a>
        </form>
    </div>
@endsection
