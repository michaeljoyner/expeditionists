@extends('admin.base')

@section('content')
    <div class="exp-page-header">
        <h1>Edit Charity</h1>
        <hr/>
    </div>
    @include('admin.forms.sponsorcharity', [
        'model' => $charity,
        'formAction' => '/admin/charities/'.$charity->id,
        'buttonText' => 'Save Changes'
    ])
@endsection