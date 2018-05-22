@extends('layouts.app')

@section('content')
    @if (count($packages) > 0)
        <div class="d-flex flex-wrap">
            @foreach ($packages as $package)
                <div class="col-sm-6">
                    <div class="card mb-4">
                        <div class="card-body">
                            <h3 class="card-title">
                                <a href="/packages/{{ $package->login }}/{{ $package->name }}">
                                    {{ $package->login }}/{{ $package->name }}
                                </a>
                            </h3>

                            <p class="card-text">
                                {{ $package->description }}
                            </p>

                            @foreach ($package->tags as $tag)
                                <a href="/tags/{{ $tag->name }}" class="badge badge-success">
                                    {{ $tag->name }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
