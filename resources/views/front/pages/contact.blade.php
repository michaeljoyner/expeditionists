@extends('front.base')

@section('head')
    @include('front.partials.ogmeta', [
        'ogImage' => asset('images/static/NEW_logo_black.png'),
        'ogTitle' => 'Contact Us | Expeditionist',
        'ogDescription' => 'Have questions, or just want to give us a piece of your mind? Here is the place to do it.'
    ])
@endsection

@section('content')
    @include('front.partials.navbar')
    <div class="w-section w-container contact-page-section">
        <h1 class="section-heading">CONTACT US</h1>
        <p class="contact-intro p1 black">{{ $page->textFor('page intro') }}</p>
        @include('front.partials.contactform')
    </div>
    @include('front.partials.footer')
@endsection

