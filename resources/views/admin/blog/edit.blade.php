@extends('admin.base')

@section('content')
    <div class="exp-page-header">
        <h1>Edit this Article</h1>
        <hr/>
    </div>
    <section class="writing-area">
        @include('admin.forms.article', [
            'model' => $article,
            'formAction' => '/admin/blog/'.$article->id,
            'buttonText' => 'Save Changes'
        ])
    </section>
@endsection

@section('bodyscripts')
    <script src="{{ asset('tinymce/js/tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: "#body-area"
        });
    </script>
@endsection