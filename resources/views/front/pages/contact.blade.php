@extends('front.base')

@section('content')
    @include('front.partials.navbar')
    <div class="w-section w-container contact-page-section">
        <h1 class="section-heading">CONTACT US</h1>
        <p class="contact-intro p1 black">{{ $page->present()->area('contact page intro') }}</p>
        @include('front.partials.contactform')
    </div>
    @include('front.partials.footer')
@endsection

