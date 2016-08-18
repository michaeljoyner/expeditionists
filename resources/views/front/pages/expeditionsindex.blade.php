@extends('front.base')

@section('css')
    <link rel="stylesheet" href="{{ elixir('css/fapp.css') }}">
@stop

@section('head')
    @include('front.partials.ogmeta', [
        'ogImage' => asset('images/static/NEW_logo_black.png'),
        'ogTitle' => 'Our Expeditions | Expeditionist',
        'ogDescription' => 'Browse through our expeditions and take the time to explore our world and where we have been, and most importantly, why.'
    ])
@endsection

@section('content')
    @include('front.partials.navbar')
    <div class="w-section expeditions-section">
    <div class="w-container exiditionists-hp-container">
      <h1 class="section-heading">EXPEDITIONS</h1>
      <div class="p1 intro-black">{{ $page->textFor('page intro') }}</div>
      <div class="w-row expeditions-row">
          @foreach($expeditions as $expedition)
              @include('front.partials.expeditioncard', ['expedition' => $expedition])
          @endforeach
      </div>
    </div>
    </div>
    @include('front.partials.footer')
  @endsection