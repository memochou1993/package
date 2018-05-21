@extends('layouts.app')

@section('content')
    @if (count($packages) > 0)
        <table border="1">
            <tr>
                <th>Login</th>
                <th>Name</th>
                <th>Description</th>
                <th>Tag</th>
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
                <td>{{ $package->description }}</td>
                <td>
                    @foreach ($package->tags as $tag)
                        <button>
                            {{ $tag->name }}
                        </button>
                    @endforeach
                </td>
            </tr>
            @endforeach
        </table>
    @endif
@endsection()
