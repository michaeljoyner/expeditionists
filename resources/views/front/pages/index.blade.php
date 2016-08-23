{{--@extends('front.base')--}}

@section('head')
    @include('front.partials.inlinestyle')
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
            <div class="hero-slideshow slick-slider">
                <div class="w-slide slide slide-1 slick-slide">
                    <img src="{{ $homePage->imagesOf('hero slider')->first()->getUrl('wide') }}" alt="" class="home-slider-img">
                    <div class="slide-text-wrapper">
                        <div class="slide-text">{{ $homePage->textFor('hero text 1', 'Epic sentence goes here!') }}</div>
                    </div>
                </div>
                <div class="w-slide slide slide-2 slick-slide">
                    <img src="{{ $homePage->imagesOf('hero slider')[1]->getUrl('wide') }}" alt="" class="home-slider-img">
                    <div class="slide-text-wrapper">
                        <div class="slide-text">{{ $homePage->textFor('hero text 2', 'Epic sentence goes here!') }}</div>
                        <a href="/expeditionists" class="get-involved-cta-button red">Expeditionists</a>
                    </div>
                </div>
                <div class="w-slide slide slide-3 slick-slide">
                    <img src="{{ $homePage->imagesOf('hero slider')[2]->getUrl('wide') }}" alt="" class="home-slider-img">
                    <div class="slide-text-wrapper">
                        <div class="slide-text">{{ $homePage->textFor('hero text 3', 'Epic sentence goes here!') }}</div>
                        <a href="/getinvolved#expeditionist" class="get-involved-cta-button red">Apply</a>
                    </div>
                </div>
                <div class="w-slide slide slide-4 slick-slide">
                    <img src="{{ $homePage->imagesOf('hero slider')[3]->getUrl('wide') }}" alt="" class="home-slider-img">
                    <div class="slide-text-wrapper">
                        <div class="slide-text">{{ $homePage->textFor('hero text 4', 'Epic sentence goes here!') }}</div>
                        <a href="/getinvolved#donate" class="get-involved-cta-button red">Donate</a>
                    </div>
                </div>
                <div class="w-slide slide slide-5 slick-slide">
                    <img src="{{ $homePage->imagesOf('hero slider')->last()->getUrl('wide') }}" alt="" class="home-slider-img">
                    <div class="slide-text-wrapper">
                        <div class="slide-text">{{ $homePage->textFor('hero text 5', 'Epic sentence goes here!') }}</div>
                        <a href="/blog" class="get-involved-cta-button red">Our News</a>
                    </div>
                </div>
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