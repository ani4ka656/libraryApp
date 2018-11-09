<h1>Books</h1>
<table border=1>
	<tr>
		<td>Name of the book</td>
		<td>Name of the author</td>
		<td>Of pagesNrmber o</td>
		<td></td>
		<td></td>
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
		</tr>

	@endforeach
</table>

<a href="{{ route('books.create') }}">Add Book</a>