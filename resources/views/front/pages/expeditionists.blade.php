@extends('front.base')

@section('content')
    @include('front.partials.navbar')
    <div class="w-section expeditions-section">
    <div class="w-container exiditionists-hp-container">
      <h1 class="section-heading">EXPEDITIONISTS</h1>
      <div class="p1 intro-black">{{ $page->textFor('page intro') }}</div>
        @foreach($profiles->chunk(3) as $profileRow)
            <div class="w-row expeditionists-row">
                @foreach($profileRow as $profile)
                    <div class="w-col w-col-4 expeditionists-column">
                        <img width="212" src="{{ $profile->profilePic() }}" class="expeditionists-image">
                        <h4 class="h4">{{ $profile->name }}</h4>
                        <div class="p1 black">{{ $profile->intro }}</div>
                        <div class="social-wrapper">
                            @include('front.partials.profilesociallinks', ['profile' => $profile, 'dark' => true])
                        </div>
                        <a href="/profiles/{{ $profile->slug }}" class="w-button button red">see profile</a>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
    </div>
    @include('front.partials.footer')
@endsection