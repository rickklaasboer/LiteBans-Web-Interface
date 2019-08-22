@extends('layout.app')

@section('title', "Mute #{$mute->id}")

@section('content')

    <div class="jumbotron text-center">
        <h2>Mute #{{ $mute->id }}</h2>
        @if($mute->active) <span class="label label-danger">Active</span> @endif
        @if($mute->until === -1) <span class="label label-danger">Permanent</span> @endif
        @if($mute->removed_by_name) <span class="label label-success">Unbanned</span> @endif
    </div>

    <table class="table table-bordered table-striped">
        <tbody>
        <tr>
            <td style="width: 20%">Muted Player</td>
            <td><img style="width: 24px;" src="https://crafatar.com/avatars/{{ $mute->uuid }}" alt=""> <a
                        href="{{ url("/history/{$mute->uuid}") }}">{{ $username }}</a></td>
        </tr>
        <tr>
            <td style="width: 20%">Muted By</td>
            <td><img style="width: 24px;" src="https://crafatar.com/avatars/{{ $mute->banned_by_uuid }}" alt=""> <a
                        href="{{ url("/history/{$mute->banned_by_uuid}") }}">{{ $mute->banned_by_name }}</a></td>
        </tr>
        <tr>
            <td style="width: 20%">Muted Reason</td>
            <td>{{ $mute->reason }}</td>
        </tr>
        </tbody>
    </table>

@endsection