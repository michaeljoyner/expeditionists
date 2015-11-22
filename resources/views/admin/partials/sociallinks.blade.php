<div class="profile-social-links">
    @if($profile->facebook)
    <div class="facebook profile-social-icon-container">
        <a href="{{ $profile->facebook }}">
            <img src="{{ asset('images/assets/icons/facebook_b.png') }}"
                 alt="facebook icon"/>
        </a>
    </div>
    @endif
    @if($profile->twitter)
    <div class="twitter profile-social-icon-container">
        <a href="{{ $profile->twitter }}">
            <img src="{{ asset('images/assets/icons/twitter_b.png') }}"
                 alt="twitter icon"/>
        </a>
    </div>
    @endif
    @if($profile->instagram)
    <div class="instagram profile-social-icon-container">
        <a href="{{ $profile->instagram }}">
            <img src="{{ asset('images/assets/icons/instagram_b.png') }}"
                 alt="instagram icon"/>
        </a>
    </div>
    @endif
    @if($profile->linkedin)
    <div class="linkedin profile-social-icon-container">
        <a href="{{ $profile->linkedin }}">
            <img src="{{ asset('images/assets/icons/linkedin_b.png') }}"
                 alt="linkedin icon"/>
        </a>
    </div>
    @endif
    @if($profile->email)
    <div class="linkedin profile-social-icon-container">
        <a href="#">
            <img src="{{ asset('images/assets/icons/email_b.png') }}"
                 alt="email icon"/>
        </a>
    </div>
    @endif
</div>