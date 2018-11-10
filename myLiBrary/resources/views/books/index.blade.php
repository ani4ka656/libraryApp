@extends('layouts.app')
@section('title','Books')



@section('content')
<h1>Books</h1>
<table border=1>
	<tr class="tableHeading">
		<td>Name of the book</td>
		<td>Name of the author</td>
		<td>Of pagesNrmber o</td>

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
			@if($book->book_path)
			<td> 
				<a href=" {{ route('downloadbooks', $book->id) }} ">
					Download
				</a>
			</td>
			@endif
		</tr>

	@endforeach
</table>
@if( Auth::user()->role == 'admin')
<a href="{{ route('books.create') }}">Add Book</a>
@endif
@endsection