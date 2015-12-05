@extends('front.base')

@section('content')
    @include('front.partials.navbar')
    <div class="w-section expeditions-section">
    <div class="w-container exiditionists-hp-container">
      <h1 class="section-heading">EXPEDITIONISTS</h1>
      <div class="p1 intro-black">{{ $page->present()->area('Intro') }}</div>
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

        {{----}}
        {{--<div class="w-col w-col-4 expeditionists-column"><img width="212" src="images/profile_pic_baby.jpg" class="expeditionists-image">--}}
          {{--<h4 class="h4">CHRIS VAN&nbsp;DYK</h4>--}}
          {{--<div class="p1 black">I'm a fly boy get down and boogie kinda guy with a lust for sweet pineapple fizz cake, truffles and coconut beer.</div>--}}
          {{--<div class="social-wrapper"><img src="images/email_b.png" class="social-icon"><img src="images/facebook_b.png" class="social-icon"><img src="images/instagram_b.png" class="social-icon"><img src="images/twitter_b.png" class="social-icon"><img src="images/linkedin_b.png" class="social-icon">--}}
          {{--</div><a href="#" class="w-button button red">see profile</a>--}}
        {{--</div>--}}
        {{--<div class="w-col w-col-4 expeditionists-column"><img width="212" src="images/profile_pic2.jpg" class="expeditionists-image">--}}
          {{--<h4 class="h4">GRAEME&nbsp;DANCER</h4>--}}
          {{--<div class="p1 black">I'm as solid as the rock I was born on. Play your cards right and you might just get to meet my little friend, Ruben.</div>--}}
          {{--<div class="social-wrapper"><img src="images/email_b.png" class="social-icon"><img src="images/facebook_b.png" class="social-icon"><img src="images/instagram_b.png" class="social-icon"><img src="images/twitter_b.png" class="social-icon"><img src="images/linkedin_b.png" class="social-icon">--}}
          {{--</div><a href="#" class="w-button button red">SEE profile</a>--}}
        {{--</div>--}}
      {{--</div>--}}
      {{--<div class="w-row expeditionists-row">--}}
        {{--<div class="w-col w-col-4 expeditionists-column"><img width="212" src="images/profile_pic.jpg" class="expeditionists-image">--}}
          {{--<h4 class="h4">TOM HART</h4>--}}
          {{--<div class="p1 black">I love big snakes and smooth lakes. Born in the wilderness of the wild. I'm a cool daddy with a hankering for an adventure.</div>--}}
          {{--<div class="social-wrapper"><img src="images/email_b.png" class="social-icon"><img src="images/facebook_b.png" class="social-icon"><img src="images/instagram_b.png" class="social-icon"><img src="images/twitter_b.png" class="social-icon"><img src="images/linkedin_b.png" class="social-icon">--}}
          {{--</div><a href="#" class="w-button button red">see profile</a>--}}
        {{--</div>--}}
        {{--<div class="w-col w-col-4 expeditionists-column"><img width="212" src="images/profile_pic_baby.jpg" class="expeditionists-image">--}}
          {{--<h4 class="h4">CHRIS VAN&nbsp;DYK</h4>--}}
          {{--<div class="p1 black">I'm a fly boy get down and boogie kinda guy with a lust for sweet pineapple fizz cake, truffles and coconut beer.</div>--}}
          {{--<div class="social-wrapper"><img src="images/email_b.png" class="social-icon"><img src="images/facebook_b.png" class="social-icon"><img src="images/instagram_b.png" class="social-icon"><img src="images/twitter_b.png" class="social-icon"><img src="images/linkedin_b.png" class="social-icon">--}}
          {{--</div><a href="#" class="w-button button red">see profile</a>--}}
        {{--</div>--}}
        {{--<div class="w-col w-col-4 expeditionists-column"><img width="212" src="images/profile_pic2.jpg" class="expeditionists-image">--}}
          {{--<h4 class="h4">GRAEME&nbsp;DANCER</h4>--}}
          {{--<div class="p1 black">I'm as solid as the rock I was born on. Play your cards right and you might just get to meet my little friend, Ruben.</div>--}}
          {{--<div class="social-wrapper"><img src="images/email_b.png" class="social-icon"><img src="images/facebook_b.png" class="social-icon"><img src="images/instagram_b.png" class="social-icon"><img src="images/twitter_b.png" class="social-icon"><img src="images/linkedin_b.png" class="social-icon">--}}
          {{--</div><a href="#" class="w-button button red">SEE profile</a>--}}
        {{--</div>--}}
    </div>
    </div>
    @include('front.partials.footer')
@endsection