@extends('layouts.app')
@section('title','MyBooks')



@section('content')

{!! Form::model($mybook, [ 'route'=>['mybooks.store'], 'files' => 'true']) !!}

		@foreach( $books as $book )
		<select name="book_id">
 		<option >{{--Select--}}</option>
			<option value="{{ $book->id }}">{{ $book->name }}</option>
		@endforeach
	</select>

						{!! Form::submit('Add This book') !!}						
						{!! Form::close() !!}
					</td>
				</tr>	
		</table>
@endsection