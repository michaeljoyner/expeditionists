@extends('admin.base')

@section('head')
    <meta id="x-token" property="CSRF-token" content="{{ Session::token() }}"/>
@stop

@section('content')
    <div class="exp-page-header">
        <h1>Expeditionists Videos</h1>
        <div class="page-actions">
            <a href="/admin/videos/create">
                <div class="btn exp-btn">New Video</div>
            </a>
        </div>
        <hr/>
    </div>
    <section class="video-list">
        @foreach($videos->chunk(2) as $row)
            <div class="row">
                @foreach($row as $video)
                <div class="col-md-6 video-index-item">
                    <a href="/admin/videos/{{ $video->id }}"><h1 class="video-title">{{ $video->title }}</h1></a>
                    <div class="video-box">
                        @include('video', [
                            'width' => 300,
                            'height' => 200,
                            'video_source' => $video->source
                        ])
                    </div>
                </div>
                @endforeach
            </div>
        @endforeach
    </section>

@endsection

@section('bodyscripts')

@endsection