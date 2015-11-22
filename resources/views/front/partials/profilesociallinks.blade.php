@if($profile->email != '')
    <a href="mailto:{{ $profile->email }}"><img src="/build/images/email_w.png" class="social-icon"></a>
@endif
@if($profile->facebook != '')
    <a href="{{ $profile->facebook }}"><img src="/build/images/facebook_w.png" class="social-icon"></a>
@endif
@if($profile->instagram != '')
    <a href="{{ $profile->instagram }}"><img src="/build/images/instagram_w.png" class="social-icon"></a>
@endif
@if($profile->twitter != '')
    <a href="{{ $profile->twitter }}"><img src="/build/images/twitter_w.png" class="social-icon"></a>
@endif
@if($profile->linkedin != '')
    <a href="{{ $profile->linkedin }}"><img src="/build/images/linkedin_w.png" class="social-icon"></a>
@endif