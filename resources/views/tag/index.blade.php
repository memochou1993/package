@extends('layouts.app')

@section('content')
    @if (count($tags) > 0)
        @foreach ($tags as $tag)
            <a href="/tags/{{ $tag->name }}" class="badge badge-success">
                {{ $tag->name }}
            </a>
        @endforeach
    @endif
@endsection()
