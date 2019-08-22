@extends('layout.app')

@section('title', "Ban #{$ban->id}")

@section('content')

    <div class="jumbotron text-center">
        <h2>Ban #{{ $ban->id }}</h2>
        @if($ban->active) <span class="label label-danger">Active</span> @endif
        @if($ban->until === -1) <span class="label label-danger">Permanent</span> @endif
        @if($ban->removed_by_name) <span class="label label-success">Unbanned</span> @endif
    </div>

    <table class="table table-bordered table-striped">
        <tbody>
        <tr>
            <td style="width: 20%">Banned Player</td>
            <td><img style="width: 24px;" src="https://crafatar.com/avatars/{{ $ban->uuid }}" alt=""> <a
                        href="{{ url("/history/{$ban->uuid}") }}">{{ $username }}</a></td>
        </tr>
        <tr>
            <td style="width: 20%">Banned By</td>
            <td><img style="width: 24px;" src="https://crafatar.com/avatars/{{ $ban->banned_by_uuid }}" alt=""> <a
                        href="{{ url("/history/{$ban->banned_by_uuid}") }}">{{ $ban->banned_by_name }}</a></td>
        </tr>
        <tr>
            <td style="width: 20%">Ban Reason</td>
            <td>{{ $ban->reason }}</td>
        </tr>
        </tbody>
    </table>

@endsection