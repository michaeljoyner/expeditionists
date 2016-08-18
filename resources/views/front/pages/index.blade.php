{{--@extends('front.base')--}}

@section('head')
    <style data-inlined>.w-button,img{display:inline-block;border:0}.w-button,a{text-decoration:none}.w-container:after,.w-row:after{clear:both}.about-heading,.button,.p1,.p1.black,.section-heading.white,.w-slider-nav{text-align:center}h1,h3,p{margin-bottom:10px}html{font-family:sans-serif;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;height:100%}a{background-color:transparent}img{max-width:100%;vertical-align:middle}*{box-sizing:border-box}body{margin:0;min-height:100%;background-color:#fff;font-family:Arial,sans-serif;font-size:14px;line-height:20px;color:#333}.w-button{padding:9px 15px;background-color:#3898ec;color:#fff;line-height:inherit;border-radius:0}h1,h3{font-weight:700}h1{margin:20px 0 .67em;font-size:38px;line-height:44px}h3{font-size:24px;line-height:30px;margin-top:20px}p{margin-top:0}.w-col{position:relative;float:left;width:100%;min-height:1px;padding-left:10px;padding-right:10px}.w-container:after,.w-container:before,.w-row:after,.w-row:before{content:" ";display:table}.w-container{margin-left:auto;margin-right:auto;max-width:940px}.w-container .w-row{margin-left:-10px;margin-right:-10px}.w-col-4{width:33.33333333%}@media screen and (max-width:991px){.w-container{max-width:728px}}@media screen and (max-width:767px){.w-container .w-row,.w-row{margin-left:0;margin-right:0}.w-col{width:100%;left:auto;right:auto}}@media screen and (max-width:479px){.w-container{max-width:none}.w-col{width:100%}}.w-slider-nav{position:absolute;z-index:2;top:auto;right:0;bottom:0;left:0;margin:auto;padding-top:10px;height:40px}.p1.white,.section-heading{display:block;text-align:center}.about-section{padding-top:55px;padding-bottom:55px;background-color:#fff}.section-heading{letter-spacing:1.1px;text-transform:uppercase;margin:0 auto 55px;padding-top:1px;font-family:Ubuntu,Helvetica,sans-serif;color:#dc5744;font-size:46px;line-height:64px}@media only screen and (max-width:413px){.section-heading{font-size:28px;line-height:1.3}}@media only screen and (min-width:414px) and (max-width:720px){.section-heading{font-size:32px;line-height:1.3}}.section-heading.white{border-bottom:8px none #dc5744;color:#f2eee7}.p1{font-family:Arvo,sans-serif;font-size:20px;line-height:30px;font-weight:400}.p1.black,.p1.white{font-family:Ubuntu,Helvetica,sans-serif;font-size:16px;line-height:22px}.about-heading,.button,.button-big,.exp-button{font-family:Arvo,sans-serif;font-weight:700;text-transform:uppercase}.p1.white{margin:30px auto;color:#f2eee7}.about-heading.white,.button{margin-right:auto;margin-left:auto;display:block}.p1.black{border-bottom:1px none #000}.p1.intro-white{margin-bottom:50px;color:#f2eee7}.p1.intro-black{margin-bottom:50px;color:#2e2e34}.about-heading{margin-bottom:20px;color:#dc5744;font-size:23px;letter-spacing:.5px}.button-big,.exp-button{display:block;font-size:19px;text-align:center;letter-spacing:.4px}.about-heading.white{width:40%;color:#f2eee7}.about-column{padding-right:30px;padding-left:30px;padding-bottom:15px;border:2px #413f3f}.button{width:70%;margin-top:30px;padding-top:6px;padding-bottom:6px;border-radius:5px;background-color:#2e2e34;color:#fff}.button.red{width:50%;margin-top:20px;margin-bottom:20px;background-color:#dc5744}.about-container{margin-top:40px;margin-bottom:40px}.expeditionists-section{padding-top:65px;padding-bottom:65px;background-color:#2e2e34}.exiditionists-hp-container{background-color:transparent}.about-blurb{display:block;width:90%;max-width:612px;margin-right:auto;margin-left:auto}.about-icon{display:block;margin:30px auto}.expeditions-section{padding-top:65px;padding-bottom:65px;background-color:#fff}.button-big{width:85%;max-width:700px;margin:20px auto;border-radius:5px;background-color:#2e2e34;color:#f2eee7}.button-big.white{margin-top:50px;margin-bottom:0;padding-top:10px;padding-bottom:10px;background-color:#f2eee7;color:#dc5744}.mission-container,.mission-section{padding-top:0;padding-bottom:0;height:0}.mission-section{background-color:#dc5744;max-height:0;overflow:hidden}.p1{color:#fff}.p1.black{margin-right:auto;margin-left:auto;display:block;width:100%;color:#2e2e34}.p1.white{width:80%}.mission-container{border:9px solid #f2eee7;-webkit-transform:translate3d(2000px,0,0);transform:translate3d(2000px,0,0);width:95%;max-width:800px;margin:0 auto}.blog-section{background-color:#fff;padding-top:65px;padding-bottom:65px}.blog-section .section-heading{margin-bottom:25px}@media (max-width:767px){.section-heading.white{text-align:center}}.map-section{background:#2e2e34;padding:40px 0}.map-section #mapdiv{width:100%;height:500px;overflow:hidden}.exp-button{width:280px;margin:20px auto;border-radius:5px;background-color:#dc5744;color:#f2eee7}.exp-button.inverse{background-color:#f2eee7;color:#2e2e34}</style>
    @include('front.partials.ogmeta', [
        'ogImage' => asset('images/static/NEW_logo_black.png'),
        'ogTitle' => 'Expeditionist',
        'ogDescription' => 'Expeditionists is an “adventure with an impact” initiative that creates packaged and marketable content of Africa for commercial and educational use by supporting and working with African adventurers on case related expeditions.'
    ])
    <meta name="google-site-verification" content="S9zkUCplGt21xzY-e5PbxtMrBYzw7thvmWba4gHz-Bw" />
@endsection

@section('content')
    @include('front.partials.navbar')
    <div class="w-section slideshow-section">
        <div data-animation="slide" data-duration="1000" data-infinite="1" data-autoplay="1" data-delay="5000" class="w-slider slider">
            <div class="w-slider-mask">
                <div class="w-slide slide slide-1">
                    <img src="{{ $homePage->imagesOf('hero slider')->first()->getUrl('wide') }}" alt="" class="home-slider-img">
                    <div class="slide-text-wrapper">
                        <div class="slide-text">{{ $homePage->textFor('hero text 1', 'Epic sentence goes here!') }}</div>
                        {{--<a href="/getinvolved" class="get-involved-cta-button red">Get Involved</a>--}}
                    </div>
                </div>
                <div class="w-slide slide slide-2">
                    <img src="{{ $homePage->imagesOf('hero slider')[1]->getUrl('wide') }}" alt="" class="home-slider-img">
                    <div class="slide-text-wrapper">
                        <div class="slide-text">{{ $homePage->textFor('hero text 2', 'Epic sentence goes here!') }}</div>
                        <a href="/expeditionists" class="get-involved-cta-button red">Expeditionists</a>
                    </div>
                </div>
                <div class="w-slide slide slide-3">
                    <img src="{{ $homePage->imagesOf('hero slider')[2]->getUrl('wide') }}" alt="" class="home-slider-img">
                    <div class="slide-text-wrapper">
                        <div class="slide-text">{{ $homePage->textFor('hero text 3', 'Epic sentence goes here!') }}</div>
                        <a href="/getinvolved#expeditionist" class="get-involved-cta-button red">Apply</a>
                    </div>
                </div>
                <div class="w-slide slide slide-4">
                    <img src="{{ $homePage->imagesOf('hero slider')[3]->getUrl('wide') }}" alt="" class="home-slider-img">
                    <div class="slide-text-wrapper">
                        <div class="slide-text">{{ $homePage->textFor('hero text 4', 'Epic sentence goes here!') }}</div>
                        <a href="/getinvolved#donate" class="get-involved-cta-button red">Donate</a>
                    </div>
                </div>
                <div class="w-slide slide slide-5">
                    <img src="{{ $homePage->imagesOf('hero slider')->last()->getUrl('wide') }}" alt="" class="home-slider-img">
                    <div class="slide-text-wrapper">
                        <div class="slide-text">{{ $homePage->textFor('hero text 5', 'Epic sentence goes here!') }}</div>
                        <a href="/blog" class="get-involved-cta-button red">Our News</a>
                    </div>
                </div>
            </div>
            <div class="w-slider-arrow-left">
                <div class="w-icon-slider-left">
                    <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26.31 32.2"><defs><style>.cls-1{fill:none;stroke:#f16060;stroke-linecap:round;stroke-linejoin:round;stroke-width:6px;}</style></defs><title>next_arrow_left</title><polyline class="cls-1" points="23.31 29.2 3 14.64 23.31 3"/></svg>
                </div>
            </div>
            <div class="w-slider-arrow-right">
                <div class="w-icon-slider-right">
                    <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 26.31 32.2"><defs><style>.cls-1{fill:none;stroke:#f16060;stroke-linecap:round;stroke-linejoin:round;stroke-width:6px;}</style></defs><title>next_arrow</title><polyline class="cls-1" points="3 3 23.31 17.55 3 29.2"/></svg>
                </div>
            </div>
            <div class="w-slider-nav w-round"></div>
        </div>
    </div>
    @include('front.partials.homeabout')
    <div class="w-section expeditionists-section">
        <h1 class="section-heading white">EXPEDITIONISTS</h1>

        <div class="about-blurb">
            <div class="p1 intro-white">{{ $homePage->textFor('expeditionists intro') }}</div>
        </div>
        <div class="w-container exiditionists-hp-container">
            <div class="w-row">
                @foreach($profiles as $profile)
                    @include('front.partials.homeexpeditionist', ['profile' => $profile])
                @endforeach
            </div>
        </div>
        <a href="/expeditionists" class="w-button exp-button inverse">SEE ALL EXPEDITIONISTS</a>
    </div>
    <div class="w-section expeditions-section">
        <h1 class="section-heading red">EXPEDITIONS</h1>

        <div class="about-blurb">
            <div class="p1 intro-black">{{ $homePage->textFor('expeditions intro') }}</div>
        </div>
        <div class="w-container exiditionists-hp-container">

            <div class="w-row expeditions-row">
                @foreach($expeditions as $expedition)
                    @include('front.partials.expeditioncard', ['expedition' => $expedition])
                @endforeach
            </div>
        </div>
        <a href="/expeditions" class="w-button exp-button">SEE ALL EXPEDITIONS</a>
    </div>
    <div class="w-section map-section">
        <h1 class="section-heading white">EXPLORE OUR WORLD</h1>
        <div id="mapdiv"></div>
    </div>
    <div class="w-section blog-section">
        <h1 class="section-heading">BLOG</h1>

        <div class="w-container blog-container">
            <div class="w-row blog-row">
                @foreach($articles as $article)
                    <div class="w-col w-col-4 blog-column">
                        <a href="/blog/{{ $article->slug }}" class="blog-title-link"><h4
                                    class="h4">{{ $article->title }}</h4></a>
                        <img src="{{ $article->author->profilePic() }}" alt="author profile"
                             class="blog-author-profile-pic-small">
                        <div class="blog-author grey">{{ $article->published_on->toFormattedDateString() }}</div>
                        <p class="p1 black">{{ $article->intro }}</p>
                    </div>
                @endforeach
            </div>
        </div>
        <a href="/blog" class="w-button exp-button">SEE MORE BLOG POSTS</a>
    </div>
    <div class="w-section involved-section">
        <h1 class="section-heading white">CHARITIES</h1>

        <div class="about-blurb">
            <div class="p1 intro-white">{{ $homePage->textFor('charities intro') }}</div>
        </div>
        <div class="w-container involved-container">
            <div class="w-row sponsor-charity-box-wrapper">
                @foreach($charities as $charity)
                    <a href="{{ $charity->site_link }}" class="sponsor-charity-box" target="_blank">
                        <div>
                            <img src="{{ $charity->thumbImage() }}" class="involved-logo">
                        </div>
                    </a>
                @endforeach
            </div>
            <a href="/getinvolved" class="w-button exp-button inverse">more about charities</a>
        </div>
    </div>
    <div class="w-section sponsors-section">
        <div class="w-container sponsors-container">
            <h1 class="section-heading">SPONSORS and PARTNERS</h1>

            <div class="about-blurb">
                <div class="p1 intro-black">{{ $homePage->textFor('sponsors intro') }}</div>
            </div>
            <div class="w-row sponsor-charity-box-wrapper">
                @foreach($sponsors as $sponsor)
                    <a href="{{ $sponsor->site_link }}" class="sponsor-charity-box" target="_blank">
                        <div>
                            <img src="{{ $sponsor->thumbImage() }}" class="involved-logo">
                        </div>
                    </a>
                @endforeach
            </div>
        </div>
        <a href="/getinvolved" class="w-button exp-button">MORE ABOUT SPONSORS</a>
    </div>
    @include('front.partials.footer')
@endsection

@section('bodyscripts')
    <script src="/ammap/ammap.js"></script>
    <script src="ammap/maps/js/worldLow.js" type="text/javascript"></script>
    <script>
        var images = {!! $mapLocations !!};
        var map = AmCharts.makeChart( "mapdiv", {
            "type": "map",
            "dataProvider": {
                "map": "worldLow",
                "getAreasFromMap": true,
                images: images
            },
            "areasSettings": {
                "color": "#dc5744",
                "autoZoom": true,
                "selectedColor": "#d7322f",
                "outlineThickness": 0,
                "rollOverColor": "#d7322f"
            },

            "zoomControl": {
                buttonFillColor: "#2e2e34",
                buttonIconColor: "#ffffff",
                buttonColorHover: "#d7322f"
            }
        } );
    </script>
    <script>
        var missionManager = {
            currentSelection: null,
            elems: {

                revealButtons: {
                    mission: document.querySelector('#see-mission-btn'),
                    vision: document.querySelector('#see-vision-btn'),
                    objectives: document.querySelector('#see-objectives-btn')
                },
                infoBlocks: {
                    mission: document.querySelector('#mission-block'),
                    vision: document.querySelector('#vision-block'),
                    objectives: document.querySelector('#objectives-block')
                },
                aboutPanel: document.querySelector('#about-panel'),
            },

            init: function () {
                missionManager.elems.revealButtons.mission.addEventListener('click', missionManager.toggleMission, false);
                missionManager.elems.revealButtons.vision.addEventListener('click', missionManager.toggleVision, false);
                missionManager.elems.revealButtons.objectives.addEventListener('click', missionManager.toggleObjectives, false);
            },

            toggleMission: function () {
                missionManager.update('mission');
            },

            toggleVision: function () {
                missionManager.update('vision');
            },

            toggleObjectives: function () {
                missionManager.update('objectives');
            },

            update: function (section) {
                if (section === missionManager.currentSelection) {
                    missionManager.clearAll();
                    return;
                }
                missionManager.clearCurrentSection();
                missionManager.showSection(section);
            },

            clearCurrentSection: function () {
                var section = missionManager.currentSelection;
                if (!section) {
                    return;
                }
                missionManager.removeClassFromElement(missionManager.elems.infoBlocks[section], 'show');
                missionManager.elems.revealButtons[section].innerHTML = 'MORE';
                missionManager.currentSelection = null;
            },

            showSection: function (section) {
                missionManager.showPanel();
                missionManager.currentSelection = section;

                missionManager.addClassToElement(missionManager.elems.infoBlocks[section], 'show');
                missionManager.elems.revealButtons[section].innerHTML = 'LESS';
            },

            clearAll: function () {
                missionManager.clearCurrentSection();
                missionManager.removeClassFromElement(missionManager.elems.aboutPanel, 'show')
            },

            addClassToElement: function (el, className) {
                el.classList.add(className);
            },

            removeClassFromElement: function (el, className) {
                el.classList.remove(className);
            },

            showPanel: function () {
                if (missionManager.elems.aboutPanel.classList.contains('show')) {
                    return;
                }
                missionManager.elems.aboutPanel.classList.add('show');
                missionManager.slideToView();
            },

            slideToView: function () {
                var offset = $('#about-panel').offset();
                $('html, body').animate({scrollTop: offset.top}, 700);
            }

        }
        missionManager.init();
    </script>
@endsection