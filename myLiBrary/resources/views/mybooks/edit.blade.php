@extends('layouts.app')
@section('title','Books')



@section('content')
<h1>
	Edit My Book
</h1>
{!! Form::model($mybook, [ 'route'=>['mybooks.update', $mybook->id], 'method'=>'patch']) !!}
<p>
	The author's name: {{ $mybook->book->author->name }}
</p>
<p>
	The Book's name: {{ $mybook->book->name }}
</p>
<p>
	Total number of pages:{{ $mybook->book->total_number_of_pages }}
</p>
	Read speed: {!!Form::text('speed', old('speed'))!!}
<p>
</p>
	Pages read: {!!Form::text('pages_read', old('pages_read'))!!}
<p>
<p>
{!! Form::submit('Update My Book',array('class'=>'btn btn-success')) !!}
</p>
{!! Form::close() !!}
@endsection