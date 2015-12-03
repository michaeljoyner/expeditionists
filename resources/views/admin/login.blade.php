@extends('admin.base')

@section('content')
    <div class="login-container">
        <img src="{{ asset('images/static/NEW_logo_black.png') }}" alt="logo">
        @include('admin.forms.login')
    </div>
@endsection