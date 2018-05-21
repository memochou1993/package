@extends('layouts.app')

@section('content')
    <table border="1">
        <tr>
            <th>Login</th>
            <th>Name</th>
        </tr>
        <tr>
            <td>{{ $contributor->login }}</td>
            <td>{{ $contributor->name }}</td>
        </tr>
    </table>

    <hr>

    <table border="1">
        <tr>
            <th>Login</th>
            <th>Name</th>
            <th>Tags</th>
            <th>Created_at</th>
        </tr>
        @foreach ($contributor->packages as $package)
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
            <td>
                @foreach ($package->tags as $tag)
                    <button>
                        {{ $tag->name }}
                    </button>
                @endforeach
            </td>
            <td>{{ $package->pivot->created_at }}</td>
        </tr>
        @endforeach
    </table>
@endsection()
