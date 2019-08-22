@extends('layout.app')

@section('title', 'Home')

@section('content')

    <div class="jumbotron text-center">
        <h2>Kick #{{ $kick->id }}</h2>
    </div>

    <table class="table table-bordered table-striped">
        <tbody>
        <tr>
            <td style="width: 20%">Banned Player</td>
            <td><img style="width: 24px;" src="https://crafatar.com/avatars/{{ $kick->uuid }}" alt=""> <a
                        href="{{ url("/history/{$kick->uuid}") }}">{{ $username }}</a></td>
        </tr>
        <tr>
            <td style="width: 20%">Banned By</td>
            <td><img style="width: 24px;" src="https://crafatar.com/avatars/{{ $kick->banned_by_uuid }}" alt=""> <a
                        href="{{ url("/history/{$kick->banned_by_uuid}") }}">{{ $kick->banned_by_name }}</a></td>
        </tr>
        <tr>
            <td style="width: 20%">Ban Reason</td>
            <td>{{ $kick->reason }}</td>
        </tr>
        </tbody>
    </table>

@endsection