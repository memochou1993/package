@extends('layouts.app')

@section('content')
    @if (count($packages) > 0)
        <table class="table">
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
                        <a href="/tags/{{ $tag->name }}" class="btn btn-outline-success">
                            {{ $tag->name }}
                        </a>
                    @endforeach
                </td>
            </tr>
            @endforeach
        </table>
    @endif
@endsection()
