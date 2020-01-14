@extends('layouts.app')

@section('content')

<div class="uper">
  @if(session()->get('success'))

    <div class="alert alert-success">
      {{ session()->get('success') }}
    </div><br/>
    @endif

    <table class="table table-striped">
    	<thead>
    		<tr>
    			<th>ID</th>
    			<th>Name</th>
    			<th>Description</th>
    			<th>Member Total</th>
    			<th>Year Founded</th>
    			<th>Website URL</th>
    			<th>SIC DIVISION ID</th>
    			<th>City</th>
    			<th>Postcode</th>
    			<th>Contact Name</th>
    			<th>Contact Phone</th>
    			<th>Contact Email</th>
    			<th>Research Notes</th>
    		</tr>
    	</thead>
    	<tbody>

    		@foreach($organisations as $organisation)
    		<tr>
    			<td>{{ $organisation->id }}</td>
    			<td><a href="{{route('organisations.show', $organisation->id)}}">{{$organisation->name}}</a></td>
    			<td>{{ $organisation->description }}</td>
    			<td>{{ $organisation->member_total }}</td>
    			<td>{{ $organisation->year_founded }}</td>
    			<td>{{ $organisation->website_url }}</td>
    			<td>{{ $organisation->sic_division_id }}</td>
    			<td>{{ $organisation->city }}</td>
    			<td>{{ $organisation->postcode }}</td>
    			<td>{{ $organisation->contact_name }}</td>
    			<td>{{ $organisation->contact_email }}</td>
    			<td>{{ $organisation->contact_phone }}</td>
    			<td>{{ $organisation->research_notes }}</td>
    			<td>
    				<form action="{{ route('organisations.edit', $organisation->id)}}" method="post">
    					@csrf
    					@method('GET')
    					<button class="btn btn-success" type="submit">Edit</button>
    				</form>
    			</td>
    			<td>
    				<form action="{{ route('organisations.destroy', $organisation->id)}}" method="post">
    					@csrf
    					@method('DELETE')
    					<button class="btn btn-danger" type="submit">Delete</button>
    				</form>
    			</td>

    		</tr>
    		@endforeach
    	</tbody>
    </table>
    <a href="{{ route('organisations.create') }}" class="btn btn-success">New</a></td>
</div>

@endsection
