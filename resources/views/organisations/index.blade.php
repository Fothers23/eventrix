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
    			<td>ID</td>
    			<td>Name</td>
    			<td>Description</td>
    			<td>Member Total</td>
    			<td>Year Founded</td>
    			<td>Website URL</td>
    			<td>SIC DIVISION ID</td>
    			<td>City</td>
    			<td>Postcode</td>
    			<td>Contact Name</td>
    			<td>Contact Phone</td>
    			<td>Contact Email</td>
    			<td>Research Notes</td>
    		</tr>
    	</thead>
    	<tbody>

    		@foreach($organisations as $organisation)
    		<tr>
    			<td>{{ $organisation->id }}</td>
    			<td>{{ $organisation->name }}</td>
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
