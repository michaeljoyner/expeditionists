@extends('front.base')

@section('head')
    @include('front.partials.ogmeta', [
        'ogImage' => asset('images/static/NEW_logo_black.png'),
        'ogTitle' => 'Videos | Expeditionist',
        'ogDescription' => 'Videos about Expedtionists and some of our experiences.'
    ])
@endsection

@section('content')
    @include('front.partials.navbar')
    <div class="divider"></div>
    <div class="w-section expedition-profile-section">
        <h1 class="section-heading white profiles-page-title">A few videos of ours</h1>
        <h1 class="section-heading profile-title">Videos</h1>
        <section class="video-list-section">
            @foreach($videos as $video)
                <div class="video-box">
                    <h1 class="video-title">{{ $video->title }}</h1>
                    <p class="video-description">{{ $video->description }}</p>
                    @include('video', [
                        'width' => 400,
                        'height' => 267,
                        'video_source' => $video->source
                    ])
                </div>
            @endforeach
        </section>
    </div>
    <div class="divider"></div>
    @include('front.partials.footer')
@endsection

@section('bodyscripts')

@endsection
