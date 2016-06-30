@extends('admin.base')

@section('head')
    <meta id="x-token" property="CSRF-token" content="{{ Session::token() }}"/>
@stop

@section('content')
    <div class="exp-page-header">
        <h1>{{ $video->title }}</h1>
        <div class="page-actions">
            <a href="/admin/videos/{{ $video->id }}/edit">
                <div class="btn exp-btn">Edit</div>
            </a>
            @include('admin.partials.deletebutton', [
                'objectName' => $video->title,
                'deleteFormAction' => '/admin/videos/'.$video->id
            ])
        </div>
        <hr/>
    </div>
    <div class="row video-show-section">
        <div class="col-md-7">
            @include('video', [
                'width' => 600,
                'height' => 400,
                'video_source' => $video->source
            ])
        </div>
        <div class="col-md-5">
            <h1 class="video-title">{{ $video->title }}</h1>
            <p class="video-description lead">{{ $video->description }}</p>
        </div>
    </div>
@endsection
@include('admin.partials.deletemodal')

@section('bodyscripts')
    @include('admin.partials.modalscript')
    <script>
                new Vue({ el: 'body'});
    </script>
@endsection