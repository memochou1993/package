@extends('layouts.app')

@section('content')
    <table border="1">
        <tr>
            <th>Login</th>
            <th>Name</th>
        </tr>
        <tr>
            <td>
                <a href="/packages/{{ $package->login }}">
                    {{ $package->login }}
                </a>
            </td>
            <td>{{ $package->name }}</td>
        </tr>
    </table>

    <hr>

    <table border="1">
        <tr>
            <th>Login</th>
            <th>Contributions</th>
            <th>Created_at</th>
        </tr>
        @foreach ($contributors as $contributor)
        <tr>
            <td>
                <a href="/contributors/{{ $contributor->login }}">
                    {{ $contributor->login }}
                </a>
            </td>
            <td>{{ $contributor->pivot->contributions }}</td>
            <td>{{ $contributor->pivot->created_at }}</td>
        </tr>
        @endforeach
    </table>
@endsection()
