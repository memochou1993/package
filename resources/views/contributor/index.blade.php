@extends('layouts.app')

@section('content')
    @if (count($contributors) > 0)
        <table border="1">
            <tr>
                <th>Id</th>
                <th>Login</th>
            </tr>
            @foreach ($contributors as $contributor)
            <tr>
                <td>
                    {{ $contributor->id }}
                </td>
                <td>
                    {{ $contributor->login }}
                </td>
            </tr>
            @endforeach
        </table>
    @endif
@endsection()
