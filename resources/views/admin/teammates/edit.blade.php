@extends('admin.base')

@section('content')
    <h1>Edit this Team Member</h1>
    @include('admin.forms.teammate', [
        'model' => $member,
        'formAction' => '/admin/team/members/'.$member->id,
        'buttonText' => 'Save Changes'
    ])
@endsection