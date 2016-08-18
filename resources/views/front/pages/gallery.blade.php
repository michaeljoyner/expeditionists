@extends('front.base')

@section('css')
    <link rel="stylesheet" href="{{ elixir('css/fapp.css') }}">
@stop

@section('head')
    @include('front.partials.ogmeta', [
        'ogImage' => asset('images/static/NEW_logo_black.png'),
        'ogTitle' => 'Gallery | Expeditionist',
        'ogDescription' => 'These are some of our favourite moments and images, captured on our travels.'
    ])
@endsection

@section('content')
    @include('front.partials.navbar')
    <div class="divider"></div>
    <div class="w-section expedition-profile-section">
        <h1 class="section-heading white profiles-page-title">Some of our favourite images from our travels</h1>
        <h1 class="section-heading profile-title">Photos</h1>
            <div class="image-gallery-wrapper">
                @foreach($gallery->getOrdered() as $image)
                    <a href="{{ $image->getUrl() }}"><img class="gallery-thumb" src="{{ $image->getUrl('thumb') }}" alt="gallery image"/></a>
                @endforeach
            </div>
    </div>
    <div class="divider"></div>
    @include('front.partials.footer')
@endsection

@section('bodyscripts')
    <script>
        $(document).ready(function() {
            $(".image-gallery-wrapper").lightGallery();
        });
    </script>
@endsection
