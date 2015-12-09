@extends('admin.base')

@section('content')
    <h1>Your Profile</h1>
    @include('admin.forms.profile', [
        'model' => $profile,
        'formAction' => '/admin/profiles/'.$profile->id,
        'buttonText' => 'Save Changes'
    ])
@endsection

@section('bodyscripts')
    <script>
        formDateValidator.init(document.querySelector('#profile-form'), document.querySelectorAll('.date-input'));
    </script>
@endsection