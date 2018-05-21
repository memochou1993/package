@extends('layouts.app')

@section('content')
    <table border="1">
        <tr>
            <th>Login</th>
            <th>Name</th>
            <th>Contributor</th>
            <th>Tags</th>
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
                    <a href="/contributors/{{ $contributor->login }}">
                        {{ $contributor->name }};
                    </a>
                @endforeach
            </td>
            <td>
                @foreach ($package->tags as $tag)
                    <button>
                        {{ $tag->name }};
                    </button>
                @endforeach
            </td>
        </tr>
    </table>
@endsection()
