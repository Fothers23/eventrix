@extends('layouts.app')

@section('title')
    <title>Organisations</title>
@endsection

@section('content')

    <div class="card-body">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div><br/>
        @endif
        <div class="container">
            <form method="post" action="{{ route('organisations.update', $organisation->id) }}">
                @method('PUT')
                @csrf

                <div class="form-group">
                    <label for="">Name</label>
                    <input type="text" class="form-control" name="name" value="{{ $organisation->name }}"/>
                </div>

                <div class="form-group">
                    <label for="">Description</label>
                    <input type="text" class="form-control" name="description"
                           value="{{ $organisation->description }}"/>
                </div>

                <div class="form-group">
                    <label for="">Member Total</label>
                    <input type="number" class="form-control" name="member_total"
                           value="{{ $organisation->member_total }}"/>
                </div>

                <div class="form-group">
                    <label for="year_founded">Year Founded</label>
                    <input type="text" class="form-control" name="year_founded"
                           value="{{ $organisation->year_founded }}"/>
                </div>

                <div class="form-group">
                    <label for="website_url">Website URL</label>
                    <input type="text" class="form-control" name="website_url"
                           value="{{ $organisation->website_url }}"/>
                </div>
                <div class="form-group">
                    <label for="sic_division_id">SIC division</label>
                    <input id="search" type="text" name="search" placeholder="Search"
                           onkeyup="filter(this.value, 'select')">
                    <select id="select" size="5" type="text" class="form-control" name="sic_division_id">
                        <option value="">N/A</option>
                        @if($organisation->sicDivision != null)
                            <option value="{{ $organisation->sic_division_id }}">{{ $organisation->sicDivision->code}}
                                : {{ $organisation->sicDivision->name}}</option>
                        @endif
                        @foreach ($sicDivisions as $sicDivision)
                            <option value="{{ $sicDivision->id }}">{{$sicDivision->code}}
                                : {{ $sicDivision->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" name="address" value="{{ $organisation->address }}"/>
                </div>

                <div class="form-group">
                    <label for="city">City</label>
                    <input type="text" class="form-control" name="city" value="{{ $organisation->city }}"/>
                </div>

                <div class="form-group">
                    <label for="postcode">Postcode</label>
                    <input type="text" class="form-control" name="postcode" value="{{ $organisation->postcode }}"/>
                </div>

                <div class="form-group">
                    <label for="contact_name">Contact Name</label>
                    <input type="contact_name" class="form-control" name="contact_name"
                           value="{{ $organisation->contact_name }}"/>
                </div>

                <div class="form-group">
                    <label for="contact_email">Contact Email</label>
                    <input type="email" class="form-control" name="contact_email"
                           value="{{ $organisation->contact_email }}"/>
                </div>

                <div class="form-group">
                    <label for="contact_phone">Contact Phone</label>
                    <input type="text" class="form-control" name="contact_phone"
                           value="{{ $organisation->contact_phone }}"/>
                </div>

                <div class="form-group">
                    <label for="">Research Notes</label>
                    <input type="text" class="form-control" name="research_notes"
                           value="{{ $organisation->research_notes }}"/>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
                <a href="{{route('organisations.show', $organisation->id)}}" class="btn btn-primary">Back</a>
            </form>
        </div>
    </div>
    <script>
        function filter(keyword, id) {
            var select = document.getElementById(id);
            for (var i = 0; i < select.length; i++) {
                var txt = select.options[i].text;
                var include = txt.toLowerCase().includes(keyword.toLowerCase());
                select.options[i].style.display = include ? '' : 'none';
            }
        }
    </script>
@endsection





