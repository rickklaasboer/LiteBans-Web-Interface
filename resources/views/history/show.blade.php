@extends('layout.app')

@section('title', 'Home')

@section('content')

    <div class="jumbotron text-center">
        <img style="width: 96px; margin-bottom: 24px" src="https://crafatar.com/avatars/{{ $uuid }}"
             alt="">
        <h2>History of <b>{{ uuid_to_username($uuid) }}</b></h2>
    </div>

    <div class="container">
        <h3>Bans</h3>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th scope="col">Player</th>
                <th scope="col">Banned By</th>
                <th scope="col">Reason</th>
                <th scope="col">Banned On</th>
                <th scope="col">Banned Until</th>
            </tr>
            </thead>
            <tbody>
            @foreach($bans as $ban)
                <tr class="pointer-on-hover" onclick="window.location.href='/ban/{{ $ban->id }}'">
                    <td><img style="width: 24px;" src="https://crafatar.com/avatars/{{ $ban->uuid }}"
                             alt=""> <a href="{{ url("/history/{$ban->uuid}") }}">{{ uuid_to_username($ban->uuid) }}</a></td>
                    <td><img style="width: 24px;" src="https://crafatar.com/avatars/{{ $ban->banned_by_uuid }}"
                             alt=""> <a href="{{ url("/history/{$ban->banned_by_uuid}") }}">{{ $ban->banned_by_name }}</a></td>
                    <td>{{ $ban->reason }}</td>
                    <td>{{ mill_to_date($ban->time) }}</td>
                    <td>{{ mill_to_date($ban->until) }}</td>
                </tr>
            @endforeach
            @if($bans->count() < 1)
                <tr>
                    <td>No Bans</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endif()
            </tbody>
        </table>

        <h3>Kicks</h3>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th scope="col">Player</th>
                <th scope="col">Kicked By</th>
                <th scope="col">Reason</th>
                <th scope="col">Kicked On</th>
            </tr>
            </thead>
            <tbody>
            @foreach($kicks as $kick)
                <tr class="pointer-on-hover" onclick="window.location.href='/kick/{{ $kick->id }}'">
                    <td><img style="width: 24px;" src="https://crafatar.com/avatars/{{ $kick->uuid }}"
                             alt=""> <a href="{{ url("/history/{$kick->uuid}") }}">{{ uuid_to_username($kick->uuid) }}</a></td>
                    <td><img style="width: 24px;" src="https://crafatar.com/avatars/{{ $kick->banned_by_uuid }}"
                             alt=""> <a href="{{ url("/history/{$kick->banned_by_uuid}") }}">{{ $kick->banned_by_name }}</a></td>
                    <td>{{ $kick->reason ? $kick->reason : 'No Reason Specified' }}</td>
                    <td>{{ mill_to_date($kick->time) }}</td>
                </tr>
            @endforeach
            @if($kicks->count() < 1)
                <tr>
                    <td>No Kicks</td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endif()
            </tbody>
        </table>

        <h3>Warnings</h3>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th scope="col">Player</th>
                <th scope="col">Warned By</th>
                <th scope="col">Reason</th>
                <th scope="col">Warned On</th>
                <th scope="col">Warned Until</th>
            </tr>
            </thead>
            <tbody>
            @foreach($warnings as $warning)
                <tr class="pointer-on-hover" onclick="window.location.href='/warn/{{ $warning->id }}'">
                    <td><img style="width: 24px;" src="https://crafatar.com/avatars/{{ $warning->uuid }}"
                             alt=""> <a href="{{ url("/history/{$warning->uuid}") }}">{{ uuid_to_username($warning->uuid) }}</a></td>
                    <td><img style="width: 24px;" src="https://crafatar.com/avatars/{{ $warning->banned_by_uuid }}"
                             alt=""> <a href="{{ url("/history/{$warning->banned_by_uuid}") }}">{{ $warning->banned_by_name }}</a></td>
                    <td>{{ $warning->reason ? $warning->reason : 'No Reason Specified' }}</td>
                    <td>{{ mill_to_date($warning->time) }}</td>
                    <td>{{ mill_to_date($warning->until) }}</td>
                </tr>
            @endforeach
            @if($warnings->count() < 1)
                <tr>
                    <td>No Warnings</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endif()
            </tbody>
        </table>

        <h3>Mutes</h3>
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th scope="col">Player</th>
                <th scope="col">Muted By</th>
                <th scope="col">Reason</th>
                <th scope="col">Muted On</th>
                <th scope="col">Muted Until</th>
            </tr>
            </thead>
            <tbody>
            @foreach($mutes as $mute)
                <tr class="pointer-on-hover" onclick="window.location.href='/mute/{{ $mute->id }}'">
                    <td><img style="width: 24px;" src="https://crafatar.com/avatars/{{ $mute->uuid }}"
                             alt=""> <a href="{{ url("/history/{$mute->uuid}") }}">{{ uuid_to_username($mute->uuid) }}</a></td>
                    <td><img style="width: 24px;" src="https://crafatar.com/avatars/{{ $mute->banned_by_uuid }}"
                             alt=""> <a href="{{ url("/history/{$mute->banned_by_uuid}") }}">{{ $mute->banned_by_name }}</a></td>
                    <td>{{ $mute->reason ? $mute->reason : 'No Reason Specified' }}</td>
                    <td>{{ mill_to_date($mute->time) }}</td>
                    <td>{{ mill_to_date($mute->until) }}</td>
                </tr>
            @endforeach

            @if($mutes->count() < 1)
                <tr>
                    <td>No Mutes</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            @endif()
            </tbody>
        </table>
    </div>

@endsection