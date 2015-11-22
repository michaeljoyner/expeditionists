@extends('admin.base')

@section('content')
    <div class="exp-page-header">
        <h1>Edit {{ $editable->page->name }} - {{ $editable->name }}</h1>
        <hr/>
    </div>
    <div class="row">
        <div class="col-md-6">
            @include('admin.forms.editable', [
                'model' => $editable,
                'formAction' => '/admin/content/editable/'.$editable->id,
                'buttonText' => 'Save'
            ])
        </div>
        <div class="col-md-6">

        </div>
    </div>

@endsection

@section('bodyscripts')
    @if($editable->allows_html)
        <script src="{{ asset('tinymce/js/tinymce/tinymce.min.js') }}"></script>
        <script>
            tinymce.init({
                selector: "#content-area"
            });
        </script>
    @endif
@endsection