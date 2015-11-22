@extends('admin.base')

@section('content')
    <div class="exp-page-header">
        <h1>Edit Sponsors</h1>
        <hr/>
    </div>
    @include('admin.forms.sponsorcharity', [
        'model' => $sponsor,
        'formAction' => '/admin/sponsors/'.$sponsor->id,
        'buttonText' => 'Save Changes'
    ])
@endsection