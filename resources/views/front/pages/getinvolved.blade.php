@extends('front.base')

@section('content')
    @include('front.partials.navbar')
    <div class="w-section involved-section">
        <h1 class="section-heading black">Get involved</h1>

        <div class="w-container involved-container">
            {{--top intro--}}
            <section>
                <div class="p1 intro-black side-padded">{{ $page->present()->area('intro') }}</div>
            </section>
            {{--donate section--}}
            <section id="donate">
                <h1 class="h4 involved side-padded get-involved-heading">donate</h1>
                <div class="p1 black side-padded">{{ $page->present()->area('donate') }}</div>
                <button>Donate via Paypal</button>
            </section>
            {{--sponsors--}}
            <section id="sponsors" class="side-padded">
                <h1 class="h4 involved get-involved-heading">becoming A sponsor</h1>
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
            {{--be an expeditionist -- needs a form--}}
            <section id="expeditionist" class="side-padded">
                <h1 class="h4 involved get-involved-heading">Be an expeditionist</h1>
                <p class="p1 black">{{ $page->present()->area('become an expeditionist') }}</p>
            </section>
            {{--be a volunteer -- needs a form--}}
            <section id="volunteer" class="side-padded">
                <h1 class="h4 involved get-involved-heading">Become a volunteer</h1>
                <p class="p1 black">{{ $page->present()->area('become an expeditionist') }}</p>
            </section>
            {{--charities--}}
            <section id="charities" class="side-padded">
                <h1 class="h4 involved get-involved-heading">ASSOCIATED CHARITIES</h1>
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

        </div>
    </div>
    @include('front.partials.footer')
@endsection