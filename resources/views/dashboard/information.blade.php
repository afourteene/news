@extends('layouts.dashboard')

@section('content')


    @if (session('mustVerifyEmail'))

        @include('partials.email-verify')

    @endif



   @include('partials.information')

@endsection
