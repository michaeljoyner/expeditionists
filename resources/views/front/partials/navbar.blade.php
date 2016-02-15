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
                        <a href="#" class="w-dropdown-link">ABOUT US</a>
                        <a href="#" class="w-dropdown-link">HOW IT WORKS</a>
                        <a href="#" class="w-dropdown-link">TEAM</a>
                    </nav>
                </div>
                <a href="/expeditionists"
                   class="w-nav-link nav-link @if(! starts_with(Request::path(), 'expeditionists')) w-active @endif"
                >EXPEDITIONISTS</a>
                <a href="/expeditions"
                   class="w-nav-link nav-link @if(! (Request::path() == 'expeditions')) w-active @endif"
                >EXPEDITIONS</a>
                {{--<a href="/getinvolved"--}}
                   {{--class="w-nav-link nav-link @if(! starts_with(Request::path(), 'getinvolved')) w-active @endif"--}}
                {{-->GET INVOLVED</a>--}}
                <div data-delay="0" data-hover="1" class="w-dropdown nav-link">
                    <div class="w-dropdown-toggle nav-link">
                        <a href="/getinvolved"><div class="nav-link @if(starts_with(Request::path(), 'getinvolved'))  w--current @endif">GET INVOLVED</div></a>
                        {{--<div class="w-icon-dropdown-toggle"></div>--}}
                    </div>
                    <nav class="w-dropdown-list">
                        <a href="#" class="w-dropdown-link">DONATE</a>
                        <a href="#" class="w-dropdown-link">SPONSOR</a>
                        <a href="#" class="w-dropdown-link">BE AN EXPEDITIONIST</a>
                        <a href="#" class="w-dropdown-link">VOLUNTEER</a>
                    </nav>
                </div>
                <a href="/blog"
                   class="w-nav-link nav-link @if(! starts_with(Request::path(), 'blog')) w-active @endif"
                >BLOG</a>
            </nav>
            <div class="w-nav-button">
                <a href="/"><img src="/build/images/NEW_logo_white.png" class="logo-navbar-image"></a>
                <div class="w-icon-nav-menu"></div>
            </div>
        </div>
    </div>
</section>