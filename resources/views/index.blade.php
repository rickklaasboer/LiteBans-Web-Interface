@extends('layout.app')

@section('title', 'Home')

@section('content')

    <div class="jumbotron text-center">
        <h2>{{ config('app.name') }} Punishments</h2>
        <p>Here is where all of our punishments are listed.</p>
    </div>

    @if (session('error'))
        <div class="alert alert-danger">
            <span>{{ session('error') }}</span>
        </div>
    @endif

@endsection