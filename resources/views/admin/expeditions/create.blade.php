@extends('admin.base')

@section('content')
    <h1>Expedition</h1>
    @include('admin.forms.expedition', [
        'model' => $expedition,
        'formAction' => '/admin/expeditions',
        'buttonText' => 'Create Expedition'
    ])
@endsection