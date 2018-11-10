@extends('layouts.app')
@section('title','MyBooks')



@section('content')
		<h1>
			My Books
		</h1>
@if(Session::has('message'))
	{{ Session::get('message') }}
@endif

	<table class="table">
		
			<tr>
				<td>Author</td>
				<td>Book name</td>
				<td>Read speed</td>
				<td>Pages read</td>
				<td>Total pages</td>
			</tr>
		@foreach($mybooks as $mybook)
			<tr>
				<td>{{ $mybook->user->name }}</td>
				<td>
					<a href="{{route('mybooks.show', $mybook->id)}}">{{ $mybook->book->name }}
					</a>
				</td>
				<td>{{ $mybook->speed }}</td>
				<td>{{ $mybook->pages_read }}</td>
				<td>{{ $mybook->book->total_number_of_pages }}</td>

			<!--<td> 
					<a href="{{route('mybooks.edit', $mybook->id)}}"> Update</a>
				</td> -->
				<td>
			 		{!! Form::open(['route' => ['mybooks.destroy', $mybook->id], 'method' => 'delete'])!!} 
				
					{!! Form::submit('Delete') !!}				

					{!! Form::close() !!}
				</td>	
			</tr>
		@endforeach
		</table>
		<a href="{{route('mybooks.create')}}">Add</a>


{!! Form::model($mybook, [ 'route'=>['mybooks.store'], 'files' => 'true']) !!}

		
		<select name="book_id">
	
 			<option >{{--Select--}}</option>
 			@foreach( $books as $book )
				<option value="{{ $book->id }}">{{ $book->name }}</option>
			@endforeach
	</select>

		{!! Form::submit('Add This book') !!}						
		{!! Form::close() !!}
								
@endsection


