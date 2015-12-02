@extends('front.base')

@section('content')
    @include('front.partials.navbar')
    <div class="w-section involved-section">
        <h1 class="section-heading black">Get involved</h1>

        <div class="w-container involved-container">
            <section>
                <div class="p1 intro-black">{{ $page->present()->area('intro') }}</div>
            </section>
            <section>
                <h1 class="h4 involved">becoming an expeditionist</h1>
                <img src="/build/images/flying.jpg" class="involved-image">
                <div class="p1 black">{{ $page->present()->area('expeditionists') }}</div>
            </section>
            <section>
                <h1 class="h4 involved">becoming A sponsor</h1>
                <div class="w-row sponsor-charity-box-wrapper">
                    @foreach($sponsors as $sponsor)
                        <a href="{{ $sponsor->site_link }}" class="sponsor-charity-box">
                            <div>
                                <img src="{{ $sponsor->thumbImage() }}" class="involved-logo">
                            </div>
                        </a>
                    @endforeach
                </div>
                <p class="p1 black">{{ $page->present()->area('sponsors') }}</p>
            </section>
            <section>
                <h1 class="h4 involved">ASSOCIATED CHARITIES</h1>
                <div class="w-row sponsor-charity-box-wrapper">
                    @foreach($charities as $charity)
                        <a href="{{ $charity->site_link }}" class="sponsor-charity-box">
                            <div>
                                <img src="{{ $charity->thumbImage() }}" class="involved-logo">
                            </div>
                        </a>
                    @endforeach
                </div>
                <p class="p1 black">{{ $page->present()->area('charities') }}</p>
            </section>
            <section>
                <h1 class="h4 involved">GET IN TOUCH</h1>
                <p class="p1 intro-black">{{ $page->present()->area('contact') }}</p>
                <div class="contact-wrapper">
                    @include('front.partials.contactform')
                </div>
            </section>

        </div>
    </div>
    @include('front.partials.footer')
@endsection