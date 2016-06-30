<section class="nav-section">
    <div class="w-section logo-banner">
        <a href="/"><img src="/build/images/NEW_logo_white.png" class="logo-banner-image"></a>
    </div>
    <div data-collapse="medium" data-animation="default" data-duration="400" class="w-nav nav-bar-section">
        <div class="w-clearfix nav-container main-nav-box">
            <nav role="navigation" class="w-nav-menu nav-bar-menu">
                {{--@if(! (Request::path() == '/'))--}}
                {{--<a href="/" class="w-nav-link nav-link">HOME</a>--}}
                {{--@endif--}}

                {{--<a href="/about"--}}
                   {{--class="w-nav-link nav-link @if(! starts_with(Request::path(), 'about')) w-active @endif"--}}
                {{-->ABOUT</a>--}}
                <div data-delay="0" data-hover="1" class="w-dropdown nav-link">
                    <div class="w-dropdown-toggle nav-link">
                        <a href="/about"><div class="nav-link @if(starts_with(Request::path(), 'about'))  w--current @endif">ABOUT</div></a>
                        {{--<div class="w-icon-dropdown-toggle"></div>--}}
                    </div>
                    <nav class="w-dropdown-list">
                        <a href="/about#about" class="w-dropdown-link sublink">ABOUT US</a>
                        <a href="/about#howitworks" class="w-dropdown-link sublink">HOW IT WORKS</a>
                        <a href="/about#team" class="w-dropdown-link sublink">TEAM</a>
                    </nav>
                </div>
                <a href="/expeditionists"
                   class="w-nav-link nav-link @if(! starts_with(Request::path(), 'expeditionists')) w-active @endif"
                >EXPEDITIONISTS</a>
                <a href="/expeditions"
                   class="w-nav-link nav-link @if(! (Request::path() == 'expeditions')) w-active @endif"
                >EXPEDITIONS</a>
                {{--<a href="/gallery"--}}
                   {{--class="w-nav-link nav-link @if(! (Request::path() == 'gallery')) w-active @endif"--}}
                {{-->GALLERY</a>--}}
                <div data-delay="0" data-hover="1" class="w-dropdown nav-link">
                    <div class="w-dropdown-toggle nav-link">
                        <div class="nav-link @if(starts_with(Request::path(), 'media'))  w--current @endif">MEDIA</div>
                    </div>
                    <nav class="w-dropdown-list">
                        <a href="/gallery" class="w-dropdown-link sublink">PHOTOS</a>
                        <a href="/videos" class="w-dropdown-link sublink">VIDEOS</a>
                    </nav>
                </div>

                <div data-delay="0" data-hover="1" class="w-dropdown nav-link">
                    <div class="w-dropdown-toggle nav-link">
                        <a href="/getinvolved"><div class="nav-link @if(starts_with(Request::path(), 'getinvolved'))  w--current @endif">GET INVOLVED</div></a>
                        {{--<div class="w-icon-dropdown-toggle"></div>--}}
                    </div>
                    <nav class="w-dropdown-list">
                        <a href="/getinvolved#donate" class="w-dropdown-link sublink">DONATE</a>
                        <a href="/getinvolved#expeditionist" class="w-dropdown-link sublink">BE AN EXPEDITIONIST</a>
                        <a href="/getinvolved#volunteer" class="w-dropdown-link sublink">VOLUNTEER</a>
                        <a href="/getinvolved#charities" class="w-dropdown-link sublink">CHARITIES</a>
                        <a href="/getinvolved#sponsors" class="w-dropdown-link sublink">SPONSOR</a>
                    </nav>
                </div>
                <a href="/blog"
                   class="w-nav-link nav-link @if(! starts_with(Request::path(), 'blog')) w-active @endif"
                >BLOG</a>
                <a href="/contact"
                   class="w-nav-link nav-link @if(! (Request::path() == 'contact')) w-active @endif"
                >CONTACT</a>
            </nav>
            <div class="w-nav-button">
                <a href="/"><img src="/build/images/NEW_logo_white.png" class="logo-navbar-image"></a>
                <div class="w-icon-nav-menu"></div>
            </div>
        </div>
    </div>
</section>