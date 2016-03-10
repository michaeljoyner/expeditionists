@extends('front.base')

@section('content')
    @include('front.partials.navbar')
    <div class="divider"></div>
    <div class="w-section expedition-profile-section">
        <h1 class="section-heading white profiles-page-title">Some of our favourite images from our travels</h1>
        <h1 class="section-heading profile-title">The Gallery</h1>


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
