@extends('layouts.app')

@section('content')
    <table border="1">
        <tr>
            <th>Login</th>
            <th>Name</th>
            <th>Contributor</th>
            <th>Topics</th>
        </tr>
        <tr>
            <td>
                <a href="/packages/{{ $package->login }}">
                    {{ $package->login }}
                </a>
            </td>
            <td>{{ $package->name }}</td>
            <td>
                @foreach ($package->contributors as $contributor)
                    {{ $contributor->name }};
                @endforeach
            </td>
            <td>
                @foreach ($package->topics as $topic)
                    {{ $topic->name }};
                @endforeach
            </td>
        </tr>
    </table>
@endsection()
