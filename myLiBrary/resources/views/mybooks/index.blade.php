@extends('layouts.app')
@section('title','MyBooks')



@section('content')
		<h1>My Books</h1>

@if(Session::has('success'))
	<button class="close" type="button" data-dismiss="alert">&times;</button>

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

	<form action="{{ route('mybooks.store')}}" role="form" method="POST" class="form-horizontal">
		<input type="hidden" name="_token" value="{{ csrf_token() }}">				

		<table class="table">
			<tr class="tableHeading">
				<td>Book Name</td>
				<td>Author</td>
				<td>Total Pages</td>
<<<<<<< HEAD
<<<<<<< HEAD
				<td style="text-align:center;">Add to Favorites</td>
=======
>>>>>>> 82f231f3fefd158638e059b772b9e8b9caafd3b2
=======
>>>>>>> 82f231f3fefd158638e059b772b9e8b9caafd3b2
			</tr>
			
			@foreach($books as $book)
				<tr>
					<td> <a href="{{route('books.show', $book->id)}}"> {{ $book->name}} </a>	</td>
					<td>{{ $book->author->name}}</td>
					<td>{{ $book->total_number_of_pages }}</td>
<<<<<<< HEAD
					<td style="text-align:center;">
						<a href="{{route('mybooks.create', $book->id)}}"><img src="{{URL::asset('/img/star.png')}}" alt="delete Pic" height="30" width="30"></a>
=======
					<td>
						<input type="radio" name="book_id"  class="form-control" id="book_id" value=" {{ $book->id }}">	 
<<<<<<< HEAD
>>>>>>> 82f231f3fefd158638e059b772b9e8b9caafd3b2
=======
>>>>>>> 82f231f3fefd158638e059b772b9e8b9caafd3b2
					</td>
				</tr>
			@endforeach
		</table>
		<div class="row">
			<div class="col-md-6">									
				<button type="submit" class="btn btn-primary btn-lg">
						Add New book
				</button>
			</div>
		</div>


	</form>	
								
@endsection


