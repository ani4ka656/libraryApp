<h1>Authors</h1>
<table border=1>
	<tr>
		<td>Name of the Author</td>
		<td>Birth Date</td>
		<td>Birth Place</td>
		<td></td>
		<td></td>
	</tr>
	@foreach($authors as $author)
		<tr>
			<td> 
				<a href=" {{ route('authors.show', $author->id) }}">{{ $author->name }}</a>
			</td>
			<td>
				{{ $author->birth_date }}
			</td>
			<td>
				{{ $author->origin }}
			</td>
			<td> 
				<a href=" {{ route('authors.edit', $author->id) }} ">
					Update
				</a>
			</td>
			<td>
		 		{!! Form::open(['route' => ['authors.destroy', $author->id], 'method' => 'delete'])!!} 
			
				{!! Form::submit('Delete') !!}				

				{!! Form::close() !!}
			</td>
		</tr>

	@endforeach
</table>

<a href="{{ route('authors.create') }}">Add Author</a>