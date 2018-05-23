@extends('layouts.app')

@section('content')
    @foreach ($tags as $tag)
        <a href="/tags/{{ $tag->name }}" class="badge badge-success">
            {{ $tag->name }}
        </a>
    @endforeach
@endsection
