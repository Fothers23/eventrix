@extends('layouts.app')

@section('title')
    <title>Rooms</title>
@endsection

@section('content')
    <div class="container">
        <div style="margin-bottom:10px">
            <h1>Edit Room</h1>
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
            <form method="post" action="{{ route('rooms.update', $room->id) }}">
                {{ csrf_field() }}
                @method('PUT')

                <div class="form-group">
                    <input type="hidden" class="form-control" name="venue_id" value="{{ $venue->id }}">
                </div>

                <div class="form-group">
                    <label for="name">Name</label>
                    <input id="name" name="name" class="form-control" type="text" maxlength="255" value="{{ old('name', $room->name) }}"/>
                </div>

                <div class="form-group">
                    <label for="total_area">Total Area</label>
                    <input id="total_area" name="total_area" class="form-control" type="number" value="{{ old('total_area', $room->total_area) }}"/>
                </div>

                <div class="form-group">
                    <label for="style_id">Style</label>
                    <input id="search" type="text"  name="search" placeholder="Search" onkeyup="filter(this.value, 'select')">
                    <select id="select" size="5" type="text" class="form-control" name="style_id">
                        @if($room->style != null)
                            <option
                                value="{{ old('style_id', $room->style_id) }}">{{ old('style_id', $room->style->name) }}</option>
                        @endif
                        @foreach ($styles as $style)
                            <option value="{{ $style->id }}">{{ $style->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="capacity">Capacity</label>
                    <input id="capacity" name="capacity" class="form-control" type="number" value="{{ old('capacity', $room->capacity) }}"/>
                </div>


                <button type="submit" class="btn btn-primary">Submit</button>
                <a href="{{route('rooms.show', $room->id)}}" class="btn btn-primary">Back</a>

            </form>
        </div>
    </div>

    <script>
        function filter(keyword, id) {
            var select = document.getElementById(id);
            for (var i = 0; i < select.length; i++) {
                var txt = select.options[i].text;
                var include = txt.toLowerCase().includes(keyword.toLowerCase());
                select.options[i].style.display = include ? '':'none';
            }
        }
    </script>
@endsection
