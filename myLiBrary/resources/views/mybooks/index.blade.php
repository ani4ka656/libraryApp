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
		
			<tr class="tableHeading">
				<td>Author</td>
				<td>Book name</td>
				<td>Read speed</td>
				<td>Pages read</td>
				<td>Total pages</td>
				<td style="text-align:center;"><img src="{{URL::asset('/img/delete.png')}}" alt="delete Pic" height="25" width="25"></td>
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
				<td style="text-align:center;">
			 		{!! Form::open(['route' => ['mybooks.destroy', $mybook->id], 'method' => 'delete'])!!} 
				
					{!! Form::submit('Delete') !!}				

					{!! Form::close() !!}
				</td>	
			</tr>
		@endforeach
		</table>
		<a href="{{route('mybooks.create')}}">Add</a>


		<table class="table">
			<tr class="tableHeading">
				<td>Book Name</td>
				<td>Author</td>
				<td>Total Pages</td>

				<td style="text-align:center;">Add to Favorites</td>

			</tr>
			
			@foreach($books as $book)
				<tr>
					<td> <a href="{{route('books.show', $book->id)}}"> {{ $book->name}} </a>	</td>
					<td>{{ $book->author->name}}</td>
					<td>{{ $book->total_number_of_pages }}</td>

					<td style="text-align:center;">
						<a href="{{route('mybooks.create', $book->id)}}"><img src="{{URL::asset('/img/star.png')}}" alt="delete Pic" height="30" width="30"></a>
					</td>
				</tr>
			@endforeach
		</table>
								
@endsection


