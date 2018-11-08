
<h1>
	Edit Author
</h1>
@if(Session::has('message'))
	{{Session::get('message')}}
@endif

@if($errors->any())
 	@foreach($errors -> all() as $error)
		{{$error}}
 	@endforeach
@endif

{!! Form::model($author, [ 'route'=>['authors.update', $author->id], 'method'=>'patch', 'files' => 'true']) !!}
{!! Form::label( 'The new name of the author') !!}
<p>
	{!!Form::text('name', old('name'))!!}
</p>
{!! Form::label('Add the new birth date') !!}
<p>
	{!! Form::dateTime('birth_date', old('date'))!!}
</p>
	{!! Form::label('name', 'The new origin of the author') !!}
<p>
	{!!Form::text('name', old('origin'))!!}
</p>	
<p>
	{!! Form::label( 'Add the new author biography') !!}
	{!! Form::textarea('biography', old('biography')) !!}
</p>

{!! Form::submit('Save Author') !!}
{!! Form::close() !!}
