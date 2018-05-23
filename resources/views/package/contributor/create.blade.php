@extends('layouts.app')

@section('content')
    @foreach ($contributors as $contributor)
        <a href="/contributors/{{ $contributor->name }}">
            {{ $contributor->name }}
        </a>
    @endforeach
@endsection
