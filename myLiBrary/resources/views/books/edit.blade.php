@extends('layouts.app')
@section('title','Books')



@section('content')
<h1>
	Edit Book
</h1>
@if(Session::has('message'))
	{{Session::get('message')}}
@endif

@if($errors->any())
 	@foreach($errors -> all() as $error)
		{{$error}}
 	@endforeach
@endif

{!! Form::model($book, [ 'route'=>['books.update', $book->id], 'method'=>'patch', 'files' => 'true']) !!}
{!! Form::label( 'The new name of the book') !!}
<p>
	{!!Form::text('name', old('name'))!!}
</p>
{!! Form::label('Choose the new author') !!}
<p>
 	<select name="author_id">
 		<option >{{--Select--}}</option>
 		<option >{{old($book->author->name)}}</option>
		@foreach( $authors as $author )
			<option value="{{ $author->id }}">{{ $author->name }}</option>
		@endforeach
	</select>
</p>
<p>
	{!! Form::file('book_path', ['id'=>'book_path']) !!}
</p>
<p>
	{!! Form::label('name', 'The number of pages') !!}
	{!!Form::text('total_number_of_pages', old('total_number_of_pages'))!!}
</p>	


{!! Form::submit('Save Book') !!}
{!! Form::close() !!}
@endsection