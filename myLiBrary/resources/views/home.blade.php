@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card" style="text-align:center">
                <div class="card-header"><h1>Dashboard</h1></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>Hello, {{ Auth::user()->name }}!</h2> 
                    <h3>How are you today?</h3> 
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
