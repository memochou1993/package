@extends('layouts.app')

@section('content')
    <table class="table">
        <tr>
            <th>Login</th>
            <th>Name</th>
            <th>Contributor</th>
            <th>Description</th>
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
                        {{ $contributor->name }}
                    </a>
                @endforeach
            </td>
            <td>{{ $package->description }}</td>
            <td>
                @foreach ($package->tags as $tag)
                    <a href="/tags/{{ $tag->name }}" class="badge badge-success">
                        {{ $tag->name }}
                    </a>
                @endforeach
            </td>
        </tr>
    </table>
@endsection()
