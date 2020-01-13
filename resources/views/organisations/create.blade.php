@extends('layouts.app')

@section('content')

<form method="post" action="{{ route('organisations.store') }}">

	{{ csrf_field() }}
					
<div class="container">

<ul>
	<li id="li_1" >
	<label class="description" for="name">name</label>
	<div>
	<input id="name" name="name" class="element text medium" type="text" maxlength="255"/> 
	</div> 
	</li>

	<li id="li_2" >
	<label class="description" for="description">description</label>
	<div>
	<textarea id="description" name="description" class="element textarea medium"></textarea> 
	</div> 
	</li>

	<li id="li_3" >
	<label class="description" for="member_total">member_total</label>
	<div>
	<input id="member_total" name="member_total" class="element text medium" type="text" maxlength="255"/> 
	</div> 
	</li>

	<li id="li_4" >
	<label class="description" for="year_founded">year_founded</label>
	<div>
	<input id="year_founded" name="year_founded" class="element text small" type="text" maxlength="255"/> 
	</div> 
	</li>

	<li id="li_5" >
	<label class="description" for="website_url">website_url</label>
	<div>
	<input id="website_url" name="website_url" class="element text medium" type="text" maxlength="255" value="http://"/> 
	</div> 
	</li>

	<li id="li_6" >
	<label class="description" for="sic_divisions_id">sic_divisions_id</label>
	<div>
	<input id="sic_divisions_id" name="sic_divisions_id" class="element text medium" type="text" maxlength="255"/> 
	</div> 
	</li>

	<li id="li_7" >
	<label class="description" for="city">city</label>
	<div>
	<input id="city" name="city" class="element text medium" type="text" maxlength="255"/> 
	</div> 
	</li>

	<li id="li_8" >
	<label class="description" for="postcode">postcode</label>
	<div>
	<input id="postcode" name="postcode" class="element text medium" type="text" maxlength="255"/> 
	</div> 
	</li>

	<li id="li_11" >
	<label class="description" for="contact_name">contact_name</label>
	<div>
	<input id="contact_name" name="contact_name" class="element text medium" type="text" maxlength="255"/> 
	</div>
	</li>

	<li id="li_11" >
	<label class="description" for="contact_email">contact_email</label>
	<div>
	<input id="contact_email" name="contact_email" class="element text medium" type="email" maxlength="255"/> 
	</div> 
	</li>

	<li id="li_10">
	<label class="description" for="contact_phone">contact_phone</label>
	<div>
	<input id="contact_phone" name="contact_phone" class="element text medium" type="number" maxlength="255"/> 
	</div> 
	</li>

	<li id="li_12">
	<label class="description" for="research_notes">research_notes</label>
	<div>
	<textarea id="research_notes" name="research_notes" class="element textarea medium" type="text" maxlength="255"></textarea> 
	</div> 
	</li>
	</ul>

	<button type="submit">Submit</button>

</form>
</div>


