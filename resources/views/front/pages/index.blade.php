{{--@extends('front.base')--}}

@section('head')
    <style data-inlined>
        .w-clearfix:after,.w-nav:after,.w-slider{clear:both}.slide,.w-slider-mask,svg:not(:root){overflow:hidden}.w-nav-link,a,a.get-involved-cta-button{text-decoration:none}h1{margin-bottom:10px}.nav-link,.section-heading,a>.nav-link{letter-spacing:1.1px;text-transform:uppercase}html{font-family:sans-serif;-ms-text-size-adjust:100%;-webkit-text-size-adjust:100%;height:100%}nav,section{display:block}a{background-color:transparent}img{border:0;max-width:100%;vertical-align:middle;display:inline-block}[class^=w-icon-]{speak:none;font-variant:normal;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;font-family:webflow-icons;font-style:normal;font-weight:400;text-transform:none;line-height:1}*{box-sizing:border-box}body{margin:0;min-height:100%;background-color:#fff;font-family:Arial,sans-serif;font-size:14px;line-height:20px;color:#333}html.w-mod-touch *{background-attachment:scroll!important}.w-clearfix:after,.w-clearfix:before{content:" ";display:table}h1{margin:20px 0 .67em;font-weight:700;font-size:38px;line-height:44px}.w-slide,.w-slider-mask{position:relative;height:100%}.w-slider{text-align:center;position:relative;background:#ddd}.w-slider-arrow-left [class^=w-icon-],.w-slider-arrow-right [class^=w-icon-],.w-slider-nav{position:absolute}.w-slider-mask{display:block;z-index:1;left:0;right:0;white-space:nowrap}.w-dropdown,.w-dropdown-toggle,.w-slide{display:inline-block}.w-slide{vertical-align:top;width:100%;white-space:normal;text-align:left}.w-slider-nav{z-index:2;top:auto;right:0;bottom:0;left:0;margin:auto;padding-top:10px;height:40px;text-align:center}.w-slider-arrow-left,.w-slider-arrow-right{position:absolute;width:80px;top:0;right:0;bottom:0;left:0;margin:auto;overflow:hidden;color:#fff;font-size:40px}.w-dropdown,.w-dropdown-link,.w-dropdown-toggle{position:relative;text-align:left;margin-left:auto;margin-right:auto}.w-slider-arrow-left{z-index:3;right:auto}.w-slider-arrow-right{z-index:4;left:auto}.w-icon-slider-left,.w-icon-slider-right{top:0;right:0;bottom:0;left:0;margin:auto;width:1em;height:1em}.w-dropdown{z-index:900}.w-dropdown-link,.w-dropdown-toggle{vertical-align:top;text-decoration:none;color:#222;padding:20px;white-space:nowrap}.w-dropdown-list{position:absolute;background:#ddd;display:none;min-width:100%}.w-dropdown-link{padding:10px 20px;display:block;background:#dc5744;color:#f2eee7}@media screen and (max-width:991px){.w-nav[data-collapse=medium] .w-dropdown,.w-nav[data-collapse=medium] .w-dropdown-toggle{display:block}.w-nav[data-collapse=medium] .w-dropdown-list{position:static}}.w-nav,.w-nav-button,.w-nav-link,.w-nav-menu{position:relative}.logo-banner-image,.nav-bar-menu,.slider,.w-nav-link{margin-right:auto;margin-left:auto}.w-nav{background:#ddd;z-index:1000}.w-nav:after,.w-nav:before{content:" ";display:table}.w-nav-link{display:inline-block;vertical-align:top;color:#222;padding:20px;text-align:left}.w-nav-menu{float:right}.w-nav-button{float:right;padding:18px;font-size:24px;display:none}@media screen and (max-width:991px){.w-nav[data-collapse=medium] .w-nav-menu{display:none}.w-nav[data-collapse=medium] .w-nav-button{display:block}}.logo-banner{background-color:#2e2e34;background-image:none;background-position:0 0;background-size:auto}.logo-banner-image{display:block;width:30%;padding-top:20px;padding-bottom:20px;padding-left:20px}.nav-bar-menu,.slider{width:100%}.nav-bar-menu{display:block;text-align:center}.nav-link,a>.nav-link{display:inline-block;font-family:Ubuntu,Helvetica,sans-serif;color:#f2eee7;font-size:14px;padding-left:10px;padding-right:10px;font-weight:800;text-align:center}.slide-text,a.get-involved-cta-button{font-weight:700;text-transform:uppercase}.nav-link .nav-link{padding-right:0;padding-left:0}.nav-bar-section{background-color:#2e2e34;color:#fff}.slider{display:block}.slide-text{font-family:Arvo,sans-serif;color:#fff;font-size:42px;line-height:1.5;text-align:left}@media only screen and (max-width:413px){.slide-text{font-size:26px}.w-slider-arrow-left,.w-slider-arrow-right{display:none}}@media only screen and (min-width:414px) and (max-width:720px){.slide-text{font-size:26px}.w-slider-arrow-left,.w-slider-arrow-right{display:none}}@media only screen and (min-width:721px) and (max-width:989px){.slide-text{font-size:32px}}.about-section{padding-top:55px;padding-bottom:55px;background-color:#fff}.section-heading{display:block;text-align:center;margin:0 auto 55px;padding-top:1px;font-family:Ubuntu,Helvetica,sans-serif;color:#dc5744;font-size:46px;line-height:64px}.slide-text-wrapper{display:block;width:60%;margin:0 auto}@media only screen and (max-width:413px){.section-heading{font-size:28px;line-height:1.3}.slide-text-wrapper{width:90%}}@media only screen and (min-width:414px) and (max-width:720px){.section-heading{font-size:32px;line-height:1.3}.slide-text-wrapper{width:90%}}@media only screen and (min-width:721px) and (max-width:989px){.slide-text-wrapper{width:90%}}.nav-container{display:block;width:80%;margin-right:auto;margin-left:auto}@media only screen and (min-width:414px) and (max-width:720px){.nav-container.main-nav-box{width:95%}}@media only screen and (min-width:721px) and (max-width:989px){.nav-container.main-nav-box{width:95%}}@media only screen and (max-width:413px){.nav-container.main-nav-box{width:95%}.nav-container.main-nav-box .w-nav-button{padding-left:0;padding-right:0;width:100%}}@media only screen and (min-width:721px) and (max-width:989px){.nav-container.main-nav-box .w-nav-button{padding-left:0;padding-right:0;width:100%}}@media only screen and (min-width:414px) and (max-width:720px){.nav-container.main-nav-box .w-nav-button{padding-left:0;padding-right:0;width:100%}.nav-container.main-nav-box .logo-navbar-image{width:60%}.nav-container.main-nav-box .w-icon-nav-menu{display:inline-block;float:right;font-size:2em}}@media only screen and (max-width:413px){.nav-container.main-nav-box .logo-navbar-image{width:60%}.nav-container.main-nav-box .w-icon-nav-menu{display:inline-block;float:right}}@media only screen and (min-width:721px) and (max-width:989px){.nav-container.main-nav-box .logo-navbar-image{width:30%}.nav-container.main-nav-box .w-icon-nav-menu{display:inline-block;float:right;font-size:2em;line-height:34px}.w-section.logo-banner{display:none}}@media only screen and (min-width:414px) and (max-width:720px){.w-section.logo-banner{display:none}}@media only screen and (max-width:413px){.w-section.logo-banner{display:none}.w-nav-link.nav-link{display:block}}.w-dropdown-list .sublink{font-size:70%}a.get-involved-cta-button{display:block;position:absolute;left:50%;-webkit-transform:translateX(-50%);transform:translateX(-50%);bottom:60px;margin:50px auto 10px;padding:15px 0;background:0 0;color:#fff;font-size:2.5em;font-family:Arvo,Helvetica Neue,Helvetica,Arial;width:10em;text-align:center;height:auto;line-height:1.3;border:8px solid #fff;opacity:0;-webkit-animation:slideUp .5s ease 1s 1 forwards;animation:slideUp .5s ease 1s 1 forwards}a.get-involved-cta-button.red{color:#dc5744;border-color:#dc5744}@media only screen and (min-width:721px) and (max-width:989px){.w-nav-link.nav-link{display:block}a.get-involved-cta-button{font-size:2em;padding:5px 0}}.w-slide .slide-text{opacity:0;-webkit-animation:slideDown .5s ease 1s 1 forwards;animation:slideDown .5s ease 1s 1 forwards;position:absolute;width:100%;text-align:center;left:0;top:40px}.w-slide .home-slider-img{min-width:100%;min-height:300px}@media only screen and (max-width:413px){a.get-involved-cta-button{font-size:2em;padding:5px 0}.w-slide .home-slider-img{max-width:none;max-height:400px}}@media only screen and (min-width:414px) and (max-width:720px){.w-nav-link.nav-link{display:block}a.get-involved-cta-button{font-size:2em;padding:5px 0}.w-slide .home-slider-img{max-width:none;max-height:400px}}@-webkit-keyframes slideDown{0%{opacity:0;-webkit-transform:translate3d(0,-200px,0);transform:translate3d(0,-200px,0)}100%{opacity:1;-webkit-transform:translate3d(0,0,0);transform:translate3d(0,0,0)}}@keyframes slideDown{0%{opacity:0;-webkit-transform:translate3d(0,-200px,0);transform:translate3d(0,-200px,0)}100%{opacity:1;-webkit-transform:translate3d(0,0,0);transform:translate3d(0,0,0)}}@-webkit-keyframes slideUp{0%{opacity:0;-webkit-transform:translate3d(-50%,250px,0);transform:translate3d(-50%,250px,0)}100%{opacity:1;-webkit-transform:translate3d(-50%,0,0);transform:translate3d(-50%,0,0)}}@keyframes slideUp{0%{opacity:0;-webkit-transform:translate3d(-50%,250px,0);transform:translate3d(-50%,250px,0)}100%{opacity:1;-webkit-transform:translate3d(-50%,0,0);transform:translate3d(-50%,0,0)}}
    </style>
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
                <div class="sponsor-slideshow">
                    @foreach($charities as $charity)
                        <div>
                            <a href="{{ $charity->site_link }}" target="_blank">
                                <img src="{{ $charity->thumbImage() }}" alt="{{ $charity->name }}">
                            </a>
                        </div>
                    @endforeach
                </div>
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
                <div class="sponsor-slideshow">
                    @foreach($sponsors as $sponsor)
                        <div>
                            <a href="{{ $sponsor->site_link }}" target="_blank">
                                <img src="{{ $sponsor->thumbImage() }}" alt="{{ $sponsor->name }}">
                            </a>
                        </div>
                    @endforeach
                </div>
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