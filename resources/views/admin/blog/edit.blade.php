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
    <script src="{{ asset('tinymce/tinymce.min.js') }}"></script>
    <script>
        tinymce.init({
            selector: "#body-area",
            plugins: ['link', 'paste', 'fullscreen'],
            menubar: false,
            toolbar: 'undo redo | styleselect | bold italic | link bullist numlist | fullscreen',
            paste_data_images: false,
            paste_as_text: true,
            height: 500,
            content_style: "body {font-size: 16px; max-width: 800px; margin: 0 auto;} * {font-size: 16px;}"
        });
    </script>
@endsection