@extends('layouts.app')
@section('title','Books')

@section('content')

<hr>
<h1>All Books</h1>
<hr>
@if( Auth::user()->role == 'admin')
	<p>
		<a href="{{ route('books.create') }}">
			<img href="{{ route('books.create') }}" src="{{URL::asset('/img/book.png')}}" alt="book Pic" height="25" width="25"> 
			Add Book
		</a>
	</p>
@endif
<table border=1>
	<tr class="tableHeading">
		<td>Name of the book</td>
		<td>Name of the author</td>
		<td>Number of pages</td>

		@if( Auth::user()->role == 'admin')
		<td style="text-align:center;"><img src="{{URL::asset('/img/edit.png')}}" alt="edit Pic" height="25" width="25"></td>
		<td style="text-align:center;"><img src="{{URL::asset('/img/delete.png')}}" alt="delete Pic" height="25" width="25"></td>
		@endif
		@if( Auth::user())
		<td style="text-align:center;"><img src="{{URL::asset('/img/download.png')}}" alt="download Pic" height="25" width="25"></td>
		@endif
	</tr>
	@foreach($books as $book)
		<tr>
			<td> 
				<a href=" {{ route('books.show', $book->id) }}">
					{{ $book->name }}
				</a>


				<!--@if($book->book_path)
				<a href=" {{ route('downloadbooks', $book->id) }}">
					<img src="{{URL::asset('/img/download.png')}}" alt="download Pic" height="25" width="25">
				@endif-->
						
				</a>
			
			</td>
			<td>
				{{ $book->author->name }}
			</td>
			<td>
				{{ $book->total_number_of_pages }}
			</td>

			@if( Auth::user()->role == 'admin')
			<td> 
				<a class="btn btn-success"  href=" {{ route('books.edit', $book->id) }} ">
					Update
				</a>
			</td>
			<td>
		 		{!! Form::open(['route' => ['books.destroy', $book->id], 'method' => 'delete'])!!} 
			
				{!! Form::submit('Delete',array('class'=>'btn btn-danger')) !!}				

				{!! Form::close() !!}
			</td>
			@endif
			@if( Auth::user())
				@if($book->book_path)
					<td> 
						<a class="btn btn-primary" href=" {{ route('downloadbooks', $book->id) }} ">
							Download
						</a>
					</td>
		
				@else
					<td style="text-align: center;"> 
						<a href="#">
							<img src="{{URL::asset('/img/commingSoon.png')}}" alt="download Pic" height="40" width="40">
						</a>
					</td>
				@endif
			@endif
		</tr>

	@endforeach
</table>
@endsection