@extends('front.base')

@section('content')
    @include('front.partials.navbar')
    <div class="w-section slideshow-section">
    <div data-animation="slide" data-duration="500" data-infinite="1" class="w-slider slider">
      <div class="w-slider-mask">
        <div class="w-slide slide slide-1">
          <div class="slide-text-wrapper">
            <div class="slide-text">Adventure with an Impact: Explore, Educate, Empower</div>
          </div>
        </div>
        <div class="w-slide slide slide-2"></div>
        <div class="w-slide slide slide-3"></div>
      </div>
      <div class="w-slider-arrow-left">
        <div class="w-icon-slider-left"></div>
      </div>
      <div class="w-slider-arrow-right">
        <div class="w-icon-slider-right"></div>
      </div>
      <div class="w-slider-nav w-round"></div>
    </div>
    </div>
    @include('front.partials.homeabout')
    <div class="w-section expeditionists-section">
    <h1 class="section-heading white">EXPEDITIONISTS</h1>
    <div class="about-blurb">
      <div class="p1 intro-white">{{ $homePage->present()->area('Expeditionists intro') }}</div>
    </div>
    <div class="w-container exiditionists-hp-container">
      <div class="w-row">
        @foreach($profiles as $profile)
            @include('front.partials.homeexpeditionist', ['profile' => $profile])
        @endforeach
      </div>
    </div>
    </div>
    <div class="w-section expeditions-section">
    <h1 class="section-heading red">EXPEDITIONS</h1>
    <div class="about-blurb">
      <div class="p1 intro-black">{{ $homePage->present()->area('Expeditions intro') }}</div>
    </div>
    <div class="w-container exiditionists-hp-container">

      <div class="w-row expeditions-row">
      @foreach($expeditions as $expedition)
          <a href="/expeditions/{{ $expedition->slug }}"><div class="w-col w-col-6 expeditions-column">
              <div class="expeditions-wrapper">
                  <img src="{{ $expedition->coverPic() }}" alt="cover image for {{ $expedition->name }}"/>
                  <div class="expeditions-image-text">
                      <span class="expedition-name">{{ $expedition->name }}</span>
                  </div>
              </div>
          </div></a>
      @endforeach
      </div>
    </div><a href="#" class="w-button button-big">SEE ALL EXPEDITIONS</a>
    </div>
    <div class="w-section map-section">
    <h1 class="section-heading black">INTERACTIVE&nbsp;MAP</h1>
    </div>
    <div class="w-section blog-section">
        <h1 class="section-heading">BLOG</h1>
        <div class="w-container blog-container">
            <div class="w-row blog-row">
              @foreach($articles as $article)
                  <div class="w-col w-col-4 blog-column">
                      {{--<img width="206" src="build/images/lyf-ohwhatfun-glitter-2.jpg" class="blog-image">--}}
                      <a href="/blog/{{ $article->slug }}" class="blog-title-link"><h4 class="h4">{{ $article->title }}</h4></a>
                      <div class="blog-author grey">{{ $article->published_on->toFormattedDateString() }}</div>
                      <p class="p1 white">{{ $article->intro }}</p>
                  </div>
              @endforeach
            </div>
        </div>
        <a href="#" class="w-button button-big white">SEE MORE BLOG POSTS</a>
    </div>
    <div class="w-section involved-section">
    <h1 class="section-heading">GET&nbsp;INVOLVED</h1>
    <div class="about-blurb">
      <div class="p1 intro-black">{{ $homePage->present()->area('Get Involved intro') }}</div>
    </div>
    <div class="w-container involved-container">
      <div class="w-row sponsor-charity-box-wrapper">
          @foreach($charities as $charity)
              <a href="{{ $charity->site_link }}" class="sponsor-charity-box"><div>
                  <img src="{{ $charity->thumbImage() }}" class="involved-logo">
              </div></a>
          @endforeach
      </div>
    </div>
    </div>
    <div class="w-section contact-section">
    <h1 class="section-heading white">CONTACT</h1>
    <div class="about-blurb">
      <div class="p1 intro-white">If you are interested in getting involved with Expeditionist.org please send us a message now.&nbsp;</div>
    </div>
    <div class="form-wrapper">
      <div class="p1 black">This is a div wrapper for a Contact Form</div>
    </div>
    </div>
    <div class="w-section sponsors-section">
    <div class="w-container sponsors-container">
      <h1 class="section-heading black">SPONSORS</h1>
      <div class="about-blurb">
        <div class="p1 intro-black">{{ $homePage->present()->area('Sponsors intro') }}</div>
      </div>
      <div class="w-row sponsor-charity-box-wrapper">
          @foreach($sponsors as $sponsor)
              <a href="{{ $sponsor->site_link }}" class="sponsor-charity-box"><div>
                      <img src="{{ $sponsor->thumbImage() }}" class="involved-logo">
                  </div></a>
          @endforeach
      </div>
    </div>
    </div>
    @include('front.partials.footer')
@endsection

@section('bodyscripts')
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

            init: function() {
                missionManager.elems.revealButtons.mission.addEventListener('click', missionManager.toggleMission, false);
                missionManager.elems.revealButtons.vision.addEventListener('click', missionManager.toggleVision, false);
                missionManager.elems.revealButtons.objectives.addEventListener('click', missionManager.toggleObjectives, false);
            },

            toggleMission: function() {
                missionManager.update('mission');
            },

            toggleVision: function() {
                missionManager.update('vision');
            },

            toggleObjectives: function() {
                missionManager.update('objectives');
            },

            update: function(section) {
                if(section === missionManager.currentSelection) {
                    missionManager.clearAll();
                    return;
                }
                missionManager.clearCurrentSection();
                missionManager.showSection(section);
            },

            clearCurrentSection: function() {
                var section = missionManager.currentSelection;
                if(!section) {
                    return;
                }
                missionManager.removeClassFromElement(missionManager.elems.infoBlocks[section], 'show');
                missionManager.elems.revealButtons[section].innerHTML = 'MORE';
                missionManager.currentSelection = null;
            },

            showSection: function(section) {
                missionManager.showPanel();
                missionManager.currentSelection = section;

                missionManager.addClassToElement(missionManager.elems.infoBlocks[section], 'show');
                missionManager.elems.revealButtons[section].innerHTML = 'LESS';
            },

            clearAll: function() {
                missionManager.clearCurrentSection();
                missionManager.removeClassFromElement(missionManager.elems.aboutPanel, 'show')
            },

            addClassToElement: function(el, className) {
                el.classList.add(className);
            },

            removeClassFromElement: function(el, className) {
                  el.classList.remove(className);
            },

            showPanel: function() {
                if(missionManager.elems.aboutPanel.classList.contains('show')) {
                    return;
                }
                missionManager.elems.aboutPanel.classList.add('show')
            }

        }
        missionManager.init();
    </script>
@endsection