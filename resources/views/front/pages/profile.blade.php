@extends('front.base')

@section('content')
    @include('front.partials.navbar')
    <div class="divider"></div>
    <div class="w-section profile-section">
        <h1 class="section-heading white profiles-page-title">EXPEDITIONIST PROFILE</h1>
        <h1 class="section-heading profile-title">{{ $profile->name }}</h1>
        <div class="w-container profile-container">
            <div class="w-row profile-row">
                <div class="w-col w-col-6 profile-column">
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
                            <span class="profile-stat-label">hero statement:</span>
                            <span class="profile-stat-answer">{{ $profile->hero_statement }}</span>
                        </li>
                    </ul>
                </div>
                <div class="w-col w-col-6 profile-column">
                    <div class="profile-pic-box">
                        <img width="316" src="{{ $profile->profilePic(false) }}" class="profile-image">
                    </div>
                    <div class="social-wrapper profile">
                        @include('front.partials.profilesociallinks', ['profile' => $profile, 'dark' => false])
                    </div>
                </div>
            </div>
        </div>
        <h3 class="h4 blue">BIO</h3>
        <div class="w-container bio-container side-padded">
            <div class="p1 left-aligned white bio">{!! nl2br($profile->biography) !!}</div>
        </div>
        @if($profile->galleries->first()->getMedia()->count() > 0)
            <h3 class="h4 blue">IMAGE GALLERY</h3>
            <div class="image-gallery-wrapper">
                @foreach($profile->galleries->first()->getOrdered() as $image)
                    <a href="{{ $image->getUrl('web') }}">
                        <img class="gallery-thumb" src="{{ $image->getUrl('thumb') }}" alt="gallery image"/>
                    </a>
                @endforeach
            </div>
        @endif
        <a href="/expeditionists" class="w-button button red next">Meet the rest of the team</a>
    </div>
    <div class="divider"></div>
    @include('front.partials.footer')
@endsection

@section('bodyscripts')
    <script>
        $(document).ready(function() {
            $(".image-gallery-wrapper").lightGallery();
        });
    </script>
@endsection
