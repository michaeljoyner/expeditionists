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

                <a href="/about"
                   class="w-nav-link nav-link @if(! starts_with(Request::path(), 'about')) w-active @endif"
                >ABOUT</a>
                <a href="/expeditionists"
                   class="w-nav-link nav-link @if(! starts_with(Request::path(), 'expeditionists')) w-active @endif"
                >EXPEDITIONISTS</a>
                <a href="/expeditions"
                   class="w-nav-link nav-link @if(! (Request::path() == 'expeditions')) w-active @endif"
                >EXPEDITIONS</a>
                <a href="/getinvolved"
                   class="w-nav-link nav-link @if(! starts_with(Request::path(), 'getinvolved')) w-active @endif"
                >GET INVOLVED</a>
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