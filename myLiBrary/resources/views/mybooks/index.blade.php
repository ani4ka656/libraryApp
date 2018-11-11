@extends('layouts.app')
@section('title','MyBooks')



@section('content')
<hr><h1>
			My Books
		</h1><hr>
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
				<td style="text-align:center;"><img src="{{URL::asset('/img/edit.png')}}" alt="update Pic" height="25" width="25"></td>
				<td style="text-align:center;"><img src="{{URL::asset('/img/delete.png')}}" alt="delete Pic" height="25" width="25"></td>
			</tr>
		@foreach($mybooks as $mybook)
			<tr>
				<td>{{ $mybook->book->author->name }}</td>
				<td>
					<a href="{{route('mybooks.show', $mybook->id)}}">{{ $mybook->book->name }}
					</a>
				</td>
				<td>{{ $mybook->speed }}</td>
				<td>{{ $mybook->pages_read }}</td>
				<td>{{ $mybook->book->total_number_of_pages }}</td>
				<td style="text-align: center!important;"><a class="btn btn-success" href="{{route('mybooks.edit', $mybook->id)}}">Update
					</a></td>
				<td style="text-align:center;">
			 		{!! Form::open(['route' => ['mybooks.destroy', $mybook->id], 'method' => 'delete'])!!} 
				
					{!! Form::submit('Delete',array('class'=>'btn btn-danger')) !!}				

					{!! Form::close() !!}
				</td>	
			</tr>
		@endforeach
		</table>
		<hr>
		<h1>
			All Books
		</h1><hr>

		<table class="table">
			<tr class="tableHeading">
				<td>Book ID</td>
				<td>Book Name</td>
				<td>Author</td>
				<td>Total Pages</td>

				<td style="text-align:center;"><img src="{{URL::asset('/img/star.png')}}" alt="delete Pic" height="28" width="28"></td>

			</tr>
			
			@foreach($books as $book)
				<tr>
					<td> <a href="{{route('books.show', $book->id)}}"> {{ $book->id}} </a>	</td>
					<td> <a href="{{route('books.show', $book->id)}}"> {{ $book->name}} </a>	</td>
					<td>{{ $book->author->name}}</td>
					<td>{{ $book->total_number_of_pages }}</td>
					
					<td style="text-align:center;">

					<form action="{{ route('mybooks.store')}}" role="form" method="POST" >
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="book_id"   id="book_id" value=" {{ $book->id }}">
						<input class="btn btn-success" type="submit" value="Add to My Books">
					</form>
					</td>
				</tr>
			@endforeach
		</table>
								
@endsection


