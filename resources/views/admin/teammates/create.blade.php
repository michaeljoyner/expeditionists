@extends('admin.base')

@section('content')
    <h1>Add a Team Member</h1>
    @include('admin.forms.teammate', [
        'model' => $member,
        'formAction' => '/admin/team/members',
        'buttonText' => 'Add Member'
    ])
@endsection