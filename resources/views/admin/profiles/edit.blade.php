@extends('admin.base')

@section('content')
    <h1>Your Profile</h1>
    @include('admin.forms.profile', [
        'model' => $profile,
        'formAction' => '/admin/profiles/'.$profile->id,
        'buttonText' => 'Save Changes'
    ])
@endsection