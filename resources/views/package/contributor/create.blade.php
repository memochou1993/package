@extends('layouts.app')

@section('content')
    @foreach ($contributors as $contributor)
        <a href="/contributors/{{ $contributor->name }}" class="btn btn-outline-success">
            {{ $contributor->name }}
        </a>
    @endforeach
@endsection
