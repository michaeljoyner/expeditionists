@extends('front.base')

@section('content')
    @include('front.partials.navbar')
    <div class="divider"></div>
    <div class="w-section expedition-profile-section">
        <h1 class="section-heading white profiles-page-title">EXPEDITION PROFILE</h1>
        <h1 class="section-heading profile-title">{{ $expedition->name }}</h1>

        <div class="w-container profile-container">
            <div class="w-row">
                <div class="w-col w-col-5 profile-column">
                    <ul class="stats-list">
                        <li class="stats-list-item">
                            <span class="profile-stat-label">Date:</span><br/>
                            <span class="profile-stat-answer">10/06/1981</span>
                        </li>
                        <li class="stats-list-item">
                            <span class="profile-stat-label">Location:</span><br/>
                            <span class="profile-stat-answer">{{ $expedition->location }}</span>
                        </li>
                        <li class="stats-list-item">
                            <span class="profile-stat-label">donation goal:</span><br/>
                            <span class="profile-stat-answer">{{ $expedition->donation_goal }}</span>
                        </li>
                        <li class="stats-list-item">
                            <span class="profile-stat-label">start date:</span><br/>
                            <span class="profile-stat-answer">{{ $expedition->start_date->toFormattedDateString() }}</span>
                        </li>
                    </ul>
                </div>
                <div class="w-col w-col-7 profile-column">
                    <div class="profile-pic-box big">
                        <img src="{{ $expedition->coverPic(false) }}" class="profile-image">
                    </div>
                    @if($expedition->expeditionists->count() > 0)
                        <div class="expedition-team">
                            <p class="stats-list-item">Team:</p>
                            <div>
                                @foreach($expedition->expeditionists as $teamMember)
                                    <a href="/profiles/{{ $teamMember->slug }}">
                                        <img class="expedition-team-profile-pic"
                                             src="{{ $teamMember->profilePic() }}"
                                             alt="profile pic of {{ $teamMember->name }}"/>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="w-container bio-container side-padded">
            <h1 class="h4 blue">MISSION</h1>
            <p class="p1 white left-aligned bio">{{ $expedition->mission }}</p>
            <h1 class="h4 blue">OBJECTIVES</h1><
            <p class="p1 white left-aligned bio">{{ $expedition->objectives }}</p>
            <h1 class="h4 blue">ABOUT</h1>
            <div class="p1 white left-aligned bio">{!! nl2br($expedition->about) !!}</div>
        </div>
        <div class="image-gallery-wrapper">
            @if($expedition->galleries->first()->getMedia()->count() > 0)
            <h1 class="h4 blue">IMAGE GALLERY</h1>
            @foreach($expedition->galleries->first()->getMedia() as $image)
                    <a href="{{ $image->getUrl('web') }}"><img class="gallery-thumb" src="{{ $image->getUrl('thumb') }}" alt="gallery image"/></a>
            @endforeach
            @endif
        </div>
        <div class="w-container sponsors-container">
            <h1 class="h4 blue">SPONSORS</h1>

            <div class="w-row sponsor-charity-box-wrapper">
                @foreach($expedition->sponsors as $sponsor)
                    <a href="{{ $sponsor->site_link }}" class="sponsor-charity-box">
                        <div>
                            <img src="{{ $sponsor->thumbImage() }}" class="involved-logo">
                        </div>
                    </a>
                @endforeach
                @if($expedition->sponsors->count() < 1)
                        <div class="section-intro-text">There are no sponsors for this expedition yet.</div>
                @endif
                    <div class="section-intro-text">Would you like to become a sponsor? Why not <a class="red-link" href="/getinvolved">get involved</a>?</div>
            </div>
        </div>
        <a href="/expeditions" class="w-button button red next">Explore our expeditions</a>
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
