 @section('header')
 	@if(isset($breed))
		<a href = "{{url('/')}}">Back to the overview</a>
	@endif
<h2>
All @if (isset($bread)){{$breed->name}}@endif Cats
<a href="{{url('cats/create')}}">
	Add a new cat
</a>
</h2>
@stop
@section('content')
	@foreach($cats as $cat)	
	<div class="cat">
		<a href="{{url('cats/'.$cat->id)}}">
			<strong>{{$cat->name}}</strong>	- {{$cat->breed->name}}
		</a>
	</div>
	@endforeach
@stop				
 <table class="table table-border">
	<thead>
				<th>ID</th>
				<th>Name</th>
				<th>Birthday</th>
				<th>Breed name</th>		
				<th colspan="2">Action</th>
	</thead>
	<tbody>
		@foreach ($cats as $cat)
		<tr>
			<th>{{$cat->id}}</th>
			<th>{{$cat->name}}</th>
			<th>{{$cat->date_of_birth}}</th>
			<th>{{$cat->breed->name}}</th>
			<th><a href="{{ url('cats/'.$cat->id.'/edit') }}">Edit</th>
			<th><a href="{{ url('cats/'.$cat->id.'/delete') }">Delete</th>
		</tr>
		@endforeach
	</tbody>
<!-- Latest compiled and minified CSS & JS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<script src="//code.jquery.com/jquery.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</table>