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

    <table class="table table-striped">
    	<thead>
    		<tr>
    			<th>ID</th>
    			<th>Name</th>
    			<th>Location</th>
    			<th>Number of Events</th>
    			<th>Year Founded</th>
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
    <a href="{{ route('organisations.create') }}" class="btn btn-success">Add organisation</a></td>
</div>

@endsection
