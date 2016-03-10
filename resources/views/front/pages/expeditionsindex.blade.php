@extends('front.base')

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