@extends('layouts.app')
@section('title','Authors')



@section('content')
<h1>
	Add Author
</h1>
@if(Session::has('message'))
	{{Session::get('message')}}
@endif

@if($errors->any())
 	@foreach($errors -> all() as $error)
		{{$error}}
 	@endforeach
@endif

{!! Form::open(['route' => 'authors.store']) !!}
{!! Form::label( 'The name of the author') !!}
<p>
	{!!Form::text('name', old('name'))!!}
</p>
{!! Form::label('Add the birth date') !!}
<p>
	{!! Form::date('birth_date', old('date'))!!}
</p>
	{!! Form::label('name', 'The origin of the author') !!}
<p>
	{!!Form::text('origin', old('origin'))!!}
</p>	
<p>
	{!! Form::label( 'Add the author biography') !!}
	{!! Form::textarea('biography', old('biography')) !!}
</p>	
{!! Form::submit('Save Author') !!}
{!! Form::close() !!}
@endsection