@extends('layouts.app')

@section('content')
    <table border="1">
        <tr>
            <th>Login</th>
        </tr>
        <tr>
            <td>{{ $contributor->login }}</td>
        </tr>
    </table>

    <hr>

    <table border="1">
        <tr>
            <th>Login</th>
            <th>Name</th>
            <th>Contributions</th>
            <th>Created_at</th>
        </tr>
        @foreach ($packages as $package)
        <tr>
            <td>
                <a href="/packages/{{ $package->login }}">
                    {{ $package->login }}
                </a>
            </td>
            <td>
                <a href="/packages/{{ $package->login }}/{{ $package->name }}">
                    {{ $package->name }}
                </a>
            </td>
            <td>{{ $package->pivot->contributions }}</td>
            <td>{{ $package->pivot->created_at }}</td>
        </tr>
        @endforeach
    </table>
@endsection()
