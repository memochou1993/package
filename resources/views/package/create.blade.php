@extends('layouts.app')

@section('content')
    @include('common.errors')

    <form action="{{ route('packages.store') }}" method="POST">
        @csrf

        <input name="html_url" placeholder="https://github.com/">
        <input type="submit">
    </form>
@endsection()
