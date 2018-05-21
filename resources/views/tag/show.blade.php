@extends('layouts.app')

@section('content')
    <table class="table">
        <tr>
            <th>Name</th>
        </tr>
        <tr>
            <td>{{ $tag->name }}</td>
        </tr>
    </table>

    <hr>

    <table class="table">
        <tr>
            <th>Login</th>
            <th>Name</th>
            <th>Tags</th>
            <th>Created_at</th>
        </tr>
        @foreach ($tag->packages as $package)
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
                    <a href="/tags/{{ $tag->name }}" class="btn btn-outline-success">
                        {{ $tag->name }}
                    </a>
                @endforeach
            </td>
            <td>{{ $package->pivot->created_at }}</td>
        </tr>
        @endforeach
    </table>
@endsection()
