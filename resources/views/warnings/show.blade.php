@extends('layout.app')

@section('title', "Warning #{$warning->id}")

@section('content')

    <div class="jumbotron text-center">
        <h2>Warning #{{ $warning->id }}</h2>
        @if($warning->active) <span class="label label-danger">Active</span> @endif
        @if($warning->until === -1) <span class="label label-danger">Permanent</span> @endif
        @if($warning->removed_by_name) <span class="label label-success">Unbanned</span> @endif
    </div>

    <table class="table table-bordered table-striped">
        <tbody>
        <tr>
            <td style="width: 20%">Warned Player</td>
            <td><img style="width: 24px;" src="https://crafatar.com/avatars/{{ $warning->uuid }}" alt=""> <a
                        href="{{ url("/history/{$warning->uuid}") }}">{{ $username }}</a></td>
        </tr>
        <tr>
            <td style="width: 20%">Warned By</td>
            <td><img style="width: 24px;" src="https://crafatar.com/avatars/{{ $warning->banned_by_uuid }}" alt=""> <a
                        href="{{ url("/history/{$warning->banned_by_uuid}") }}">{{ $warning->banned_by_name }}</a></td>
        </tr>
        <tr>
            <td style="width: 20%">Warning Reason</td>
            <td>{{ $warning->reason }}</td>
        </tr>
        </tbody>
    </table>

@endsection