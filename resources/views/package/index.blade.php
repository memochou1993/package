@extends('layouts.app')

@section('content')
    @if (count($packages) > 0)
        <table border="1">
            <tr>
                <th>Name</th>
                <th>Description</th>
            </tr>
            @foreach ($packages as $package)
            <tr>
                <td>
                    <a href="/packages/{{ $package->login }}/{{ $package->name }}">
                        {{ $package->name }}
                    </a>
                </td>
                <td>{{ $package->description }}</td>
            </tr>
            @endforeach
        </table>
    @endif
@endsection()
