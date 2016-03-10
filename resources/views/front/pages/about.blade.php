@extends('front.base')

@section('content')
    @include('front.partials.navbar')
    <div class="w-section about-page">
        <h1 id="about" class="section-heading">ABOUT US</h1>

        <div class="w-container about-page-container">
            <article class="about-page-body side-padded">
                {!! $aboutPage->textFor('about us')!!}
            </article>
        </div>

        <h1 id="howitworks" class="section-heading">HOW IT WORKS</h1>
        <div class="w-container about-page-container">
            <article class="about-page-body side-padded">
                {!! $aboutPage->textFor('how it works')!!}
            </article>
        </div>

        <h1 id="team" class="section-heading">THE TEAM</h1>
        <div class="w-container about-page-container">
            @foreach($members as $member)
                <div class="team-member-card">
                    <img src="{{ $member->profilePic() }}" alt="{{ $member->name }} profile image" class="profile-pic">
                    <h4 class="member-name h4">{{ $member->name }}</h4>
                    <h5 class="member-title">{{ $member->title }}</h5>
                    <p class="member-intro p1 black">{{ $member->intro }}</p>
                </div>
            @endforeach
        </div>
    </div>
    @include('front.partials.footer')
@endsection