@extends('admin.base')

@section('head')
    <meta id="x-token" property="CSRF-token" content="{{ Session::token() }}"/>
@stop

@section('content')
    <div class="exp-page-header">
        <h1>Set a cover image for {{ $article->title }}</h1>
        <hr/>
    </div>
    <section class="article-cover-upload row">
        <div class="col-md-4">
            <p>Click on the right to add an optional image to this article. Try to use an image that is at least 700 - 800px wide, to ensure that the image quality is not too low when shown on the site.</p>
        </div>
        <div class="col-md-8 single-image-uploader-box">
            <div id="article-cover-uploader">
                <singleupload default="{{ $article->coverPic() }}"
                              url="/admin/uploads/blog/{{ $article->id }}/image"
                              shape="square"
                              size="full"
                ></singleupload>
            </div>
        </div>
    </section>
@endsection

@section('bodyscripts')
    <script>
        new Vue({
            el: '#article-cover-uploader'
        });
    </script>
@endsection