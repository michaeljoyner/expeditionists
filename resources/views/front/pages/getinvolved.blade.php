@extends('front.base')

@section('content')
    @include('front.partials.navbar')
    <div class="w-section get-involved-section">
        <h1 class="section-heading red">Get involved</h1>

        <div class="involved-container">
            {{--top intro--}}
                <p class="p1 intro-black side-padded">{{ $page->textFor('page intro') }}</p>
            {{--donate section--}}
            <section id="donate" class="get-involved-dark">
                <h1 class="h4 involved side-padded get-involved-heading donate-heading">donate</h1>
                <p class="p1 side-padded">{{ $page->textFor('donate') }}</p>
                <div class="paypal-btn-container">
                    <form action="https://www.paypal.com/cgi-bin/webscr" method="post" target="_top">
                        <input type="hidden" name="cmd" value="_s-xclick">
                        <input type="hidden" name="hosted_button_id" value="K2KEULARX4SMC">
                        <input type="image" src="https://www.paypalobjects.com/en_US/i/btn/btn_donateCC_LG.gif" border="0" name="submit" alt="PayPal - The safer, easier way to pay online!">
                        <img alt="" border="0" src="https://www.paypalobjects.com/en_US/i/scr/pixel.gif" width="1" height="1">
                    </form>
                </div>
                {{--<button class="w-button button paypal-btn">Donate via Paypal</button>--}}
            </section>

            {{--be an expeditionist --}}
            <section id="expeditionist" class="side-padded">
                <h1 class="h4 involved get-involved-heading">Become an expeditionist</h1>
                <p class="p1 black">{{ $page->textFor('expeditionists') }}</p>
                <a href="{{ $expeditionistPdf->file_path }}" class="pdf-download-link" download>Get the pdf</a>
                <a href="#application" class="get-involved-btn">
                    <div class="w-button exp-button">Become an expeditionist</div>
                </a>
            </section>
            {{--be a volunteer -- needs a form--}}
            <section id="volunteer" class="side-padded get-involved-dark">
                <h1 class="h4 involved get-involved-heading">Become a volunteer</h1>
                <p class="p1">{{ $page->textFor('volunteers') }}</p>
                <a href="#application" class="get-involved-btn">
                    <a href="{{ $volunteerPdf->file_path }}" class="pdf-download-link" download>Get the pdf</a>
                    <div class="w-button exp-button inverse">Become a volunteer</div>
                </a>
            </section>
            {{--charities--}}
            <section id="charities" class="side-padded">
                <h1 class="h4 involved get-involved-heading">ASSOCIATED CHARITIES</h1>
                <p class="p1 black">{{ $page->textFor('charities') }}</p>
                <div class="w-row sponsor-charity-box-wrapper">
                    @foreach($charities as $charity)
                        <div class="sponsor-charity-box">
                            <div>
                                <a href="{{ $charity->site_link }}"><img src="{{ $charity->thumbImage() }}" class="involved-logo"></a>
                                <p class="description">{!! $charity->description !!}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

            </section>
            {{--sponsors--}}
            <section id="sponsors" class="side-padded get-involved-dark">
                <h1 class="h4 involved get-involved-heading">becoming A sponsor</h1>
                <p class="p1">{{ $page->textFor('sponsors') }}</p>
                <div class="w-row sponsor-charity-box-wrapper">
                    @foreach($sponsors as $sponsor)
                        <div class="sponsor-charity-box">
                            <div>
                                <a href="{{ $sponsor->site_link }}"><img src="{{ $sponsor->thumbImage() }}" class="involved-logo"></a>
                                <p class="description">{!! $sponsor->description !!}</p>
                            </div>
                        </div>
                    @endforeach
                </div>

            </section>
            <section id="application">
                <h1 class="h4 involved get-involved-heading" id="application-heading">Apply</h1>
                <p class="p1 black" id="success-message"></p>
                @include('front.partials.applicationform')
            </section>
        </div>
    </div>
    @include('front.partials.footer')
@endsection

@section('bodyscripts')
    <script>
        var getInvolvedPage = {
            headingEl: document.querySelector('#application-heading'),
            containerEl: document.querySelector('#application'),
            applicationForm: document.querySelector('#application-form'),
            successMsgEl: document.querySelector('#success-message'),
            handleSubmittedForm: function() {
                getInvolvedPage.headingEl.innerHTML = 'Thanks for your application!';
                getInvolvedPage.successMsgEl.innerHTML = 'We appreciate it. We will contact you shortly.'
                getInvolvedPage.containerEl.classList.add('complete');
                getInvolvedPage.containerEl.style.minHeight = "300px";
                getInvolvedPage.applicationForm.style.display = "none";
                window.scrollTo(0, getInvolvedPage.containerEl.offsetTop);
            }
        };

        new AjaxForm(document.querySelector('#application-form'), getInvolvedPage.handleSubmittedForm);
    </script>
@endsection