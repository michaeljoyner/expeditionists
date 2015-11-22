@extends('admin.base')

@section('content')
    <h1>Reset your password</h1>
    <p><strong>Name: </strong>{{ Auth::user()->name }}</p>
    <p><strong>Email: </strong>{{ Auth::user()->email }}</p>
    @include('admin.forms.resetpassword')
@endsection