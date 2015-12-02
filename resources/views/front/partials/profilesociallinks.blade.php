@if($profile->email != '')
    <a href="mailto:{{ $profile->email }}"><img src="/build/images/email_{{ $dark ? 'b' : 'w' }}.png" class="social-icon"></a>
@endif
@if($profile->facebook != '')
    <a href="{{ $profile->facebook }}"><img src="/build/images/facebook_{{ $dark ? 'b' : 'w' }}.png" class="social-icon"></a>
@endif
@if($profile->instagram != '')
    <a href="{{ $profile->instagram }}"><img src="/build/images/instagram_{{ $dark ? 'b' : 'w' }}.png" class="social-icon"></a>
@endif
@if($profile->twitter != '')
    <a href="{{ $profile->twitter }}"><img src="/build/images/twitter_{{ $dark ? 'b' : 'w' }}.png" class="social-icon"></a>
@endif
@if($profile->linkedin != '')
    <a href="{{ $profile->linkedin }}"><img src="/build/images/linkedin_{{ $dark ? 'b' : 'w' }}.png" class="social-icon"></a>
@endif