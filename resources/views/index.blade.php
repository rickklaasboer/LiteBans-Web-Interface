@extends('layout.app')

@section('title', 'Home')

@section('content')

    <div class="jumbotron text-center">
        <h2>WegoNetwork Punishments</h2>
        <p>Here is where all of our punishments are listed.</p>
    </div>

    @if (session('error'))
        <div class="container">
            <div class="alert alert-danger">
                <span>{{ session('error') }}</span>
            </div>
        </div>
    @endif

@endsection