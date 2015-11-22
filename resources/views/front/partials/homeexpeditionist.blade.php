<div class="w-col w-col-4 expeditionists-column">
    <img width="212" src="{{ $profile->profilePic() }}" class="expeditionists-image">
    <h4 class="h4">{{ $profile->name }}</h4>
    <div class="p1 white">{{ $profile->intro }}</div>
    <div class="social-wrapper">
        @include('front.partials.profilesociallinks', ['profile' => $profile])
    </div>
    <a href="/profiles/{{ $profile->slug }}" class="w-button button white">see profile</a>
</div>