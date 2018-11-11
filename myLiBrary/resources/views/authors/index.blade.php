@extends('layouts.app')
@section('title','Authors')



@section('content')
<hr>
<h1>Authors</h1>
<hr>
@if( Auth::user()->role == 'admin')
	<a href="{{ route('authors.create') }}"><img href="{{ route('books.create') }}" src="{{URL::asset('/img/user.png')}}" alt="book Pic" height="25" width="25"> Add Author</a>
@endif
<p></p>
<table border=1>

	<tr class="tableHeading">
		<td>Name of the Author</td>
		<td>Birth Date</td>
		<td>Birth Place</td>
		<td>Number of Books</td>
		@if( Auth::user()->role == 'admin')
			<td>Update</td>
			<!-- <td>Delete</td> -->
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
			<td> 
				{{ $author->number_of_books }}
			</td>
			@if( Auth::user()->role == 'admin')
			<td> 
				<a class="btn btn-success" href=" {{ route('authors.edit', $author->id) }} ">
					Update
				</a>
			</td>
			<!-- 
			<td>
		 		{!! Form::open(['route' => ['authors.destroy', $author->id], 'method' => 'delete'])!!} 
			
				{!! Form::submit('Delete') !!}				

				{!! Form::close() !!}
			</td> -->
			@endif
		</tr>

	@endforeach
</table>

@endsection