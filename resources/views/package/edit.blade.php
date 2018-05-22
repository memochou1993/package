@extends('layouts.app')

@section('content')
    <form action="{{ route('packages.update', $package->id) }}" method="POST" class="needs-validation">
        @csrf
        @method('PATCH')

        <div class="mb-3">
            <label for="login">Login</label>
            <input type="text" name="login" value="{{ $package->login }}" class="form-control" id="login" disabled>
        </div>
        <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" name="name" value="{{ $package->name }}" class="form-control" id="name" disabled>
        </div>
        <div class="mb-3">
            <label for="description">Description</label>
            <textarea name="description" cols="30" rows="10" class="form-control" id="description">{{ $package->description }}</textarea>
        </div>
        <div class="mb-3">
            <input type="submit" class="btn btn-primary btn-lg btn-block">
        </div>
    </form>
    <hr>
    <form action="{{ route('tags.store') }}" method="POST" class="needs-validation">
        @csrf

        <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" name="name" value="" class="form-control" id="name">
        </div>
        <div class="mb-3">
            <input type="submit" class="btn btn-primary btn-lg btn-block">
        </div>
    </form>
@endsection
