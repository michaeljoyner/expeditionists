@extends('admin.base')

@section('head')
    <meta id="x-token" property="CSRF-token" content="{{ Session::token() }}"/>
    <script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
@stop

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
    @include('admin.partials.tinymceblog')
@endsection