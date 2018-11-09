@extends('layouts.app')
@section('title','MyBooks')



@section('content')
		<h1>My Books</h1>

@if(Session::has('success'))
	<button class="close" type="button" data-dismiss="alert">&times;</button>

@endif

	<table class="table">
		
		
		@foreach($mybooks as $mybook)
			<tr>
				<td>{{ $mybook->user->name }}</td>
				<td>
					<a href="{{route('mybooks.show', $mybook->id)}}">{{ $mybook->book->name }}
					</a>
				</td>
				<td>{{ $mybook->speed }}</td>
				<td>{{ $mybook->pages_read }}</td>
				<td>{{ $mybook->book->total_pages }}</td>
				<td> 
					<a href="{{route('mybooks.edit', $mybook->id)}}"> Update</a>
				</td>
				<td>
			 		{!! Form::open(['route' => ['mybooks.destroy', $mybook->id], 'method' => 'delete'])!!} 
				
					{!! Form::submit('Delete') !!}				

					{!! Form::close() !!}
				</td>	
			</tr>
		@endforeach

	</table>	

		<table class="table">
			<tr>
				<td>Book Name</td>
				<td>Author</td>
				<td>Total Pages</td>
			</tr>
			
			@foreach($books as $book)
				<tr>
					<td> <a href="{{route('books.show', $book->id)}}"> {{ $book->name}} </a>	</td>
					<td>{{ $book->author->name}}</td>
					<td>{{ $book->total_pages }}</td>
					<td>
						{!! Form::radio('book_id', $book->id) !!}
					</td>
				</tr>
			@endforeach
		</table>									
				<button type="submit">
						Add New book
				</button>
@endsection


