@extends('preload.default')

@section('container')
    @include('partials.header')

    <div class="container bodies">
        <h1> Welcome, {{ Auth::user()->name; }}! </h1>

        <p> Welcome to hell! </p>
        <p> Have a very nice day in here. </p>

        <p> Hahaha! </p>
    </div>

    @include('partials.footer')
@endsection