@extends('layout.app')

@section('title', 'Home')

@section('content')

    <div class="jumbotron text-center">
        <h2>Bans <span class="badge text-white">{{ $mutescount }}</span></h2>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th scope="col">Muted Player</th>
            <th scope="col">Muted By</th>
            <th scope="col">Reason</th>
            <th scope="col">Muted On</th>
            <th scope="col">Muted Until</th>
        </tr>
        </thead>
        <tbody>
        @foreach($mutes->reverse() as $mute)
            <tr class="pointer-on-hover" onclick="window.location.href='/mute/{{ $mute->id }}'">
                <td><img style="width: 24px;" src="https://crafatar.com/avatars/{{ $mute->uuid }}" alt=""> <a
                            href="{{ url("/history/{$mute->uuid}") }}">{{ uuid_to_username($mute->uuid) }}</a></td>
                <td><img style="width: 24px;" src="@if($mute->banned_by_name === 'Console') https://crafatar.com/avatars/f78a4d8dd51b4b3998a3230f2de0c670 @else https://crafatar.com/avatars/{{ $mute->banned_by_uuid }}" @endif alt="">
                    <a href="{{ url("/history/{$mute->banned_by_uuid}") }}">{{ $mute->banned_by_name }}</a></td>
                <td>{{ $mute->reason }}</td>
                <td>{{ mill_to_date($mute->time) }}</td>
                <td>{{ mill_to_date($mute->until) }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>


    {{ $mutes->links() }}


@endsection