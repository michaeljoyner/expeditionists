@extends('admin.base')

@section('content')
    <div class="exp-page-header">
        <h1>Write a new article</h1>
        <hr/>
    </div>
    <section class="writing-area">
        @include('admin.forms.article', [
            'model' => $article,
            'formAction' => '/admin/blog',
            'buttonText' => 'Save Article'
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