@extends('front.base')

@section('content')
    @include('front.partials.navbar')
    <div class="divider"></div>
    <div class="w-section profile-section">
    <h1 class="section-heading white">EXPEDITIONIST&nbsp;PROFILE</h1>
    <div class="w-container profile-container">
      <div class="w-row profile-row">
        <div class="w-col w-col-6 profile-column">
            <div class="profile-pic-box">
                <img width="316" src="{{ $profile->profilePic(false) }}" class="profile-image">
            </div>
            <div class="social-wrapper profile">
                @include('front.partials.profilesociallinks', ['profile' => $profile])
            </div>
        </div>
        <div class="w-col w-col-6 profile-column">
          <h1 class="h4 blue">{{ $profile->name }}</h1>
          <ul class="stats-list">
            <li class="stats-list-item">
                <span class="profile-stat-label">AGE:</span>
                <span class="profile-stat-answer">{{ $profile->date_of_birth->age }}</span>
            </li>
            <li class="stats-list-item">
                <span class="profile-stat-label">nationality:</span>
                <span class="profile-stat-answer">{{ $profile->nationality }}</span>
            </li>
            <li class="stats-list-item">
                <span class="profile-stat-label">residence:</span>
                <span class="profile-stat-answer">{{ $profile->residence }}</span></li>
            <li class="stats-list-item">
                <span class="profile-stat-label">athletic skills:</span>
                <span class="profile-stat-answer">{{ $profile->athletic_skills }}</span>
            </li>
            <li class="stats-list-item">
                <span class="profile-stat-label">hero status:</span>
                <span class="profile-stat-answer">{{ $profile->hero_status }}</span>
            </li>
            <li class="stats-list-item">
                <span class="profile-stat-label">hero statement:</span><br/>
                <span class="profile-stat-answer">{{ $profile->hero_statement }}</span>
            </li>
          </ul>
        </div>
      </div>
    </div>
    <h1 class="h4 blue">BIO</h1>
    <div class="w-container bio-container">
      <div class="p1 white bio">{!! nl2br($profile->biography) !!}</div>
    </div>
    <h1 class="h4 blue">IMAGE GALLERY</h1>
    <div class="image-gallery-wrapper">
        @foreach($profile->galleries->first()->getMedia() as $image)
            <div class="gallery-image-box">
                <img src="{{ $image->getUrl('thumb') }}" alt="gallery image"/>
            </div>
        @endforeach
    </div>
    <a href="#" class="w-button button red next">NEXT EXPEDITIONIST</a>
    </div>
    <div class="divider"></div>
    @include('front.partials.footer')
@endsection
