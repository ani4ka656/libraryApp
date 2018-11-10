@extends('layouts.app')
@section('title','Authors')



@section('content')
<h1>Authors</h1>
<table border=1>
	<tr>
		<td>Name of the Author</td>
		<td>Birth Date</td>
		<td>Birth Place</td>
		@if( Auth::user()->role == 'admin')
		<td></td>
		<td></td>
		@endif
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
			@if( Auth::user()->role == 'admin')
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
			@endif
		</tr>

	@endforeach
</table>
@if( Auth::user()->role == 'admin')
<a href="{{ route('authors.create') }}">Add Author</a>
@endif
@endsection