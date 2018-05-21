@extends('layouts.app')

@section('content')
    @if (count($tags) > 0)
        @foreach ($tags as $tag)
            <a href="/tags/{{ $tag->name }}" class="btn btn-outline-success">
                {{ $tag->name }}
            </a>
        @endforeach
    @endif
@endsection()
