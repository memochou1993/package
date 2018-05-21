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

    @if (!empty($contributor))
    <table border="1">
        <tr>
            <th>Login</th>
            <th>Name</th>
            <th>Created_at</th>
        </tr>
        <tr>
            <td>
                <a href="/contributors/{{ $contributor->login }}">
                    {{ $contributor->login }}
                </a>
            </td>
            <td>{{ $contributor->name }}</td>
            <td>{{ $contributor->pivot->created_at }}</td>
        </tr>
    </table>
    @endif
@endsection()
