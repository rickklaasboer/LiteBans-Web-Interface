@extends('layout.app')

@section('title', 'All Kicks')

@section('content')

    <div class="jumbotron text-center">
        <h2>Kicks <span class="badge text-white">{{ $kickscount }}</span></h2>
    </div>

    <div class="container">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th scope="col">Kicked Player</th>
                <th scope="col">Kicked By</th>
                <th scope="col">Reason</th>
                <th scope="col">Kicked on</th>
            </tr>
            </thead>
            <tbody>
            @foreach($kicks->reverse() as $kick)
                <tr class="pointer-on-hover" onclick="window.location.href='/kick/{{ $kick->id }}'">
                    <td><img style="width: 24px;" src="https://crafatar.com/avatars/{{ $kick->uuid }}" alt=""> <a
                                href="{{ url("/history/{$kick->uuid}") }}">{{ uuid_to_username($kick->uuid) }}</a></td>
                    <td><img style="width: 24px;" src="https://crafatar.com/avatars/{{ $kick->banned_by_uuid }}" alt="">
                        <a href="{{ url("/history/{$kick->banned_by_uuid}") }}">{{ $kick->banned_by_name }}</a></td>
                    <td>{{ $kick->reason ? $kick->reason : 'No Reason Specified'}}</td>
                    <td>{{ mill_to_date($kick->time) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>


        {{ $kicks->links() }}

    </div>

@endsection