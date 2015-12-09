@extends('front.base')

@section('content')
    @include('front.partials.navbar')
    <div class="w-section about-page">
    <h1 class="section-heading">ABOUT EXPEDITIONISTS.ORG</h1>

    <div class="w-container about-page-container">
      <article class="about-page-body side-padded">
          {!! $aboutPage->present()->area('about')!!}
      </article>
    </div>
    </div>
    @include('front.partials.footer')
@endsection