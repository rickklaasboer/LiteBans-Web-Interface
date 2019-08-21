@extends('layout.app')

@section('title', 'Home')

@section('content')

    <div class="jumbotron text-center">
        <h2>Bans <span class="badge text-white">{{ $mutescount }}</span></h2>
    </div>

    <div class="container">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th scope="col">Banned Player</th>
                <th scope="col">Banned By</th>
                <th scope="col">Reason</th>
                <th scope="col">Banned on</th>
                <th scope="col">Banned Until</th>
            </tr>
            </thead>
            <tbody>
            @foreach($mutes->reverse() as $mute)
                <tr class="pointer-on-hover" onclick="window.location.href='/ban/{{ $mute->id }}'">
                    <td><img style="width: 24px;" src="https://crafatar.com/avatars/{{ $mute->uuid }}" alt=""> <a
                                href="{{ url("/history/{$mute->uuid}") }}">{{ uuid_to_username($mute->uuid) }}</a></td>
                    <td><img style="width: 24px;" src="https://crafatar.com/avatars/{{ $mute->banned_by_uuid }}" alt="">
                        <a href="{{ url("/history/{$mute->banned_by_uuid}") }}">{{ $mute->banned_by_name }}</a></td>
                    <td>{{ $mute->reason }}</td>
                    <td>{{ mill_to_date($mute->time) }}</td>
                    <td>{{ mill_to_date($mute->until) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>


        {{ $mutes->links() }}

    </div>

@endsection