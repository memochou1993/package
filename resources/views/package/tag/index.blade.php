@extends('layouts.app')

@section('content')
    @foreach ($package->tags as $tag)
        <a href="/tags/{{ $tag->name }}" class="btn btn-outline-success">
            {{ $tag->name }}
        </a>
    @endforeach
@endsection
