@extends('layout.app')

@section('title', 'All Bans')

@section('content')

    <div class="jumbotron text-center">
        <h2>Bans <span class="badge text-white">{{ $banscount }}</span></h2>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th scope="col">Banned Player</th>
            <th scope="col">Banned By</th>
            <th scope="col">Reason</th>
            <th scope="col">Banned On</th>
            <th scope="col">Banned Until</th>
        </tr>
        </thead>
        <tbody>
        @foreach($bans->reverse() as $ban)
            <tr class="pointer-on-hover" onclick="window.location.href='/ban/{{ $ban->id }}'">
                <td><img style="width: 24px;" src="https://crafatar.com/avatars/{{ $ban->uuid }}" alt=""> <a
                            href="{{ url("/history/{$ban->uuid}") }}">{{ uuid_to_username($ban->uuid) }}</a></td>
                <td><img style="width: 24px;" src="https://crafatar.com/avatars/{{ $ban->banned_by_uuid }}" alt="">
                    <a href="{{ url("/history/{$ban->banned_by_uuid}") }}">{{ $ban->banned_by_name }}</a></td>
                <td>{{ $ban->reason }}</td>
                <td>{{ mill_to_date($ban->time) }}</td>
                <td>{{ mill_to_date($ban->until) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>


    {{ $bans->links() }}


@endsection