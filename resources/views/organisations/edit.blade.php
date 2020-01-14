@extends('layouts.app')

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
              <input type="text" class="form-control" name="name" value="{{ $organisation->name }}" />
          </div>

          <div class="form-group">
              <label for="">Description</label>
              <input type="text" class="form-control" name="description" value="{{ $organisation->description }}" />
          </div>

          <div class="form-group">
              <label for="">Member Total</label>
              <input type="number" class="form-control" name="member_total" value="{{ $organisation->member_total }}" />
          </div>

          <div class="form-group">
              <label for="year_founded">Year Founded</label>
              <input type="text" class="form-control" name="year_founded" value="{{ $organisation->year_founded }}" />
          </div>

          <div class="form-group">
              <label for="website_url">Website URL</label>
              <input type="text" class="form-control" name="website_url" value="{{ $organisation->website_url }}" />
          </div>

          <div class="form-group">
              <label for="sic_division_id">SIC DIVISION</label>
              <input type="text" class="form-control" name="sic_division_id" value="{{ $organisation->sic_division_id }}" />
          </div>

          <div class="form-group">
              <label for="city">City</label>
              <input type="city" class="form-control" name="city" value="{{ $organisation->city }}" />
          </div>

          <div class="form-group">
              <label for="postcode">Postcode</label>
              <input type="text" class="form-control" name="postcode" value="{{ $organisation->postcode }}" />
          </div>

          <div class="form-group">
              <label for="">Contact Name</label>
              <input type="contact_name" class="form-control" name="contact_name" value="{{ $organisation->contact_name }}" />
          </div>

          <div class="form-group">
              <label for="contact_email">Contact Email</label>
              <input type="contact_email" class="form-control" name="contact_email" value="{{ $organisation->contact_email }}" />
          </div>

          <div class="form-group">
              <label for="contact_phone">Contact Phone</label>
              <input type="text" class="form-control" name="contact_phone" value="{{ $organisation->contact_phone }}" />
          </div>

          <div class="form-group">
              <label for="">Research Notes</label>
              <input type="text" class="form-control" name="research_notes" value="{{ $organisation->research_notes }}" />
          </div>

          <button type="submit" class="btn btn-primary">Update</button>

      </form>
  </div>
</div>

  @endsection





