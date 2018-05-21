@extends('layouts.app')

@section('content')
@if (count($contributors) > 0)
        <table border="1">
            <tr>
                <th>Login</th>
                <th>Name</th>
            </tr>
            @foreach ($contributors as $contributor)
            <tr>
                <td>
                    <a href="/contributors/{{ $contributor->login }}">
                        {{ $contributor->login }}
                    </a>
                </td>
                <td>
                    {{ $contributor->name }}
                </td>
            </tr>
            @endforeach
        </table>
    @endif
@endsection()
