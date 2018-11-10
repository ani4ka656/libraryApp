@extends('layouts.app')
@section('title','Books')



@section('content')
@if( Auth::user()->role == 'admin')

<p><a href="{{ route('books.create') }}"><img src="{{URL::asset('/img/book.png')}}" alt="download Pic" height="25" width="25"> Add Book</a><p>
@endif
<hr>
<h1>All Books</h1>

<table border=1>
	<tr class="tableHeading">
		<td>Name of the book</td>
		<td>Name of the author</td>
		<td>Of pagesNrmber o</td>

		@if( Auth::user()->role == 'admin')
		<td style="text-align:center;"><img src="{{URL::asset('/img/edit.png')}}" alt="edit Pic" height="25" width="25"></td>
		<td style="text-align:center;"><img src="{{URL::asset('/img/delete.png')}}" alt="delete Pic" height="25" width="25"></td>
		@endif
		@if( Auth::user()->role == 'admin')
		<td style="text-align:center;"><img src="{{URL::asset('/img/download.png')}}" alt="download Pic" height="25" width="25"></td>
		@endif
	</tr>
	@foreach($books as $book)
		<tr>
			<td> 
				<!--@if( Auth::user()->role == 'admin')-->
				<a href=" {{ route('books.index', $book->id) }}">
					{{ $book->name }}
				</a>
				<!--@endif-->

				<!--@if( Auth::user()->role == 'reader')-->
				<a href="@if($book->book_path) {{ route('books.show', $book->id) }} @endif">
					<!--@if($book->book_path)-->
					<img src="{{URL::asset('/img/download.png')}}" alt="download Pic" height="25" width="25"><!--@endif--> {{ $book->name }} 
						
				</a>
				<!--@endif-->
			</td>
			<td>
				{{ $book->author->name }}
			</td>
			<td>
				{{ $book->total_number_of_pages }}
			</td>

			@if( Auth::user()->role == 'admin')
			<td> 
				<a href=" {{ route('books.edit', $book->id) }} ">
					Update
				</a>
			</td>
			<td>
		 		{!! Form::open(['route' => ['books.destroy', $book->id], 'method' => 'delete'])!!} 
			
				{!! Form::submit('Delete') !!}				

				{!! Form::close() !!}
			</td>
			@endif
			@if( Auth::user()->role == 'admin')
				@if($book->book_path)
				<td> 
					<a href=" {{ route('downloadbooks', $book->id) }} ">
						Download
					</a>
				</td>
				@endif
				@else
				<td> 
					<a href="#">
						<img src="{{URL::asset('/img/commingSoon.png')}}" alt="download Pic" height="25" width="25">
					</a>
				</td>
				@endelse
			@endif
		</tr>

	@endforeach
</table>

@endsection