@extends('layout.app')

@section('title', 'Home')

@section('content')

    <div class="jumbotron text-center">
        <h2>Warnings <span class="badge text-white">{{ $warningscount }}</span></h2>
    </div>

    <div class="container">
        <table class="table table-bordered table-striped">
            <thead>
            <tr>
                <th scope="col">Warned Player</th>
                <th scope="col">Warned By</th>
                <th scope="col">Reason</th>
                <th scope="col">Warned on</th>
            </tr>
            </thead>
            <tbody>
            @foreach($warnings->reverse() as $warning)
                <tr class="pointer-on-hover" onclick="window.location.href='/warning/{{ $warning->id }}'">
                    <td><img style="width: 24px;" src="https://crafatar.com/avatars/{{ $warning->uuid }}" alt=""> <a
                                href="{{ url("/history/{$warning->uuid}") }}">{{ uuid_to_username($warning->uuid) }}</a></td>
                    <td><img style="width: 24px;" src="https://crafatar.com/avatars/{{ $warning->banned_by_uuid }}" alt="">
                        <a href="{{ url("/history/{$warning->banned_by_uuid}") }}">{{ $warning->banned_by_name }}</a></td>
                    <td>{{ $warning->reason }}</td>
                    <td>{{ mill_to_date($warning->time) }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>


        {{ $warnings->links() }}

    </div>

@endsection