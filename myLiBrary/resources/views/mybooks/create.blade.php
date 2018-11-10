@extends('layouts.app')
@section('title','add')



@section('content')
<h1>Add Your Book</h1>
{!! Form::open(['route' => 'mybooks.store']) !!}

		
		<select name="book_id">
	
 			<option >{{--Select--}}</option>
 			@foreach( $books as $book )
				<option value="{{ $book->id }}">{{ $book->name }}</option>
			@endforeach
		</select>

		{!! Form::submit('Add This book') !!}						
		{!! Form::close() !!}
@endsection