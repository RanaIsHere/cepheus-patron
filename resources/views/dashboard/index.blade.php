@extends('preload.default')

@section('container')
    @include('partials.header')

    <div class="container bodies">
        <h1> Welcome, {{ Auth::user()->name; }}! </h1>

        @if (Auth::user()->level == 'EDP')
            <p style="font-size: 20px"> Cepheus Patron is honored to have you as our pillars within our community, although you are above the privilege of an operator. You are still required to take psychological tests and surveys every week to measure your dedication to our customer base.</p>
        @endif

        @if (Auth::user()->level == 'OPERATOR')
            <p style="font-size: 20px">As a civilian, it is your duty to prove your loyalty to Origin Corporation. Take surveys and psychological test every week as we will measure your loyalties and dedication to our customer base!</p>
            <p style="font-size: 20px"> Your last known loyalty level: 87% </p>
            <p style="font-size: 20px"> Have a very nice day! </p>
        @endif

        @if (Auth::user()->level == 'ADMIN')
            <p style="font-size: 20px"> Cepheus Patron has hired <b>{{ $userData->count() }} employees</b> since its deployment.</p>
            <p style="font-size: 20px"> Our last employee hired was: <b>{{ $userData->last()->name }}</b> since {{ $userData->last()->created_at->diffInDays() }} days ago or {{ $userData->last()->created_at->diffInHours() }} hours ago. @if($userData->last()->created_at->diffInMinutes()< 2000) Alternatively hired since, {{ $userData->last()->created_at->diffInMinutes() }} minutes ago. @endif </p>
            <p style="font-size: 18px"> As our trusted administrator within Cepheus Patron, it is your duty to examine the strength and weakness of all employees, and their willingness or commitment to their own duty. </p>
        @endif
    </div>

    @include('partials.footer')
@endsection