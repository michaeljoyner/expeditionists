@extends('admin.base')

@section('head')
    <meta id="x-token" property="CSRF-token" content="{{ Session::token() }}"/>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@stop

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
    {{--<script src="{{ asset('/tinymce/tinymce.min.js') }}"></script>--}}
    {{--<script>--}}
        {{--tinymce.init({--}}
            {{--selector: "#body-area",--}}
            {{--plugins: ['link', 'paste', 'fullscreen'],--}}
            {{--menubar: false,--}}
            {{--toolbar: 'undo redo | styleselect | bold italic | link bullist numlist | fullscreen',--}}
            {{--paste_data_images: false,--}}
            {{--paste_as_text: true,--}}
            {{--height: 500,--}}
            {{--content_style: "body {font-size: 16px; max-width: 800px; margin: 0 auto;} * {font-size: 16px;}"--}}
        {{--});--}}
    {{--</script>--}}
    @include('admin.partials.tinymceblog')
@endsection