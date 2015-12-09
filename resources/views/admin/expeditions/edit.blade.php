@extends('admin.base')

@section('content')
    <h1>Expedition</h1>
    @include('admin.forms.expedition', [
        'model' => $expedition,
        'formAction' => '/admin/expeditions/'.$expedition->id,
        'buttonText' => 'Save Changes'
    ])
@endsection

@section('bodyscripts')
    <script>
        formDateValidator.init(document.querySelector('#expedition-form'), document.querySelectorAll('.date-input'));
    </script>
@endsection