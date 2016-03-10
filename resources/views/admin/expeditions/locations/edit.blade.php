@extends('admin.base')

@section('content')
    <div class="exp-page-header">
        <h1>Edit Location</h1>
        <hr/>
    </div>
    @include('admin.forms.location', [
        'model' => $location,
        'formAction' => '/admin/locations/'.$location->id,
        'buttonText' => 'Save Changes'
    ])
@endsection