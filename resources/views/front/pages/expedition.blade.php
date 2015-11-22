@extends('front.base')

@section('content')
    @include('front.partials.navbar')
    <div class="divider"></div>
    <div class="w-section expedition-profile-section">
    <h1 class="section-heading white">EXPEDITION PROFILE</h1>
    <div class="profile-container">
      <div class="w-row">
        <div class="w-col w-col-5 profile-column">
            <div class="profile-pic-box big">
                <img width="455" src="{{ $expedition->coverPic(false) }}" class="profile-image">
            </div>
        </div>
        <div class="w-col w-col-7 profile-column">
          <h1 class="h4 blue">{{ $expedition->name }}</h1>
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
            <li class="stats-list-item">
                <span class="profile-stat-label">mission:</span><br/>
                <span class="profile-stat-answer">{{ $expedition->mission }}</span>
            </li>
            <li class="stats-list-item">
                <span class="profile-stat-label">objectives:</span><br/>
                <span class="profile-stat-answer">{{ $expedition->objectives }}</span>
            </li>
            <li class="stats-list-item">TEAM:</li>
          </ul>
        </div>
      </div>
    </div>
    <div class="w-container bio-container">
      <h1 class="h4 blue">ABOUT</h1>
      <div class="p1 white bio">{!! nl2br($expedition->about) !!}</div>
    </div>
    <div class="image-gallery-wrapper">
      <h1 class="h4 blue">IMAGE&nbsp;GALLERY</h1>
        @foreach($expedition->galleries->first()->getMedia() as $image)
            <div class="gallery-image-box">
                <img src="{{ $image->getUrl('thumb') }}" alt="gallery image"/>
            </div>
        @endforeach
    </div>
    <div class="w-container sponsors-container">
      <h1 class="h4 blue">SPONSORS</h1>
      <div class="section-intro-text">This is a list of sponsors associated with this Expedition.</div>
      <div class="w-row">
        <div class="w-col w-col-2 sponsors-column"><img src="/build/images/sponsor1.png" class="sponsors-logo">
        </div>
        <div class="w-col w-col-2 sponsors-column"><img src="/build/images/charity2.png" class="sponsors-logo">
        </div>
        <div class="w-col w-col-2 sponsors-column"><img src="/build/images/charity3.png" class="sponsors-logo">
        </div>
        <div class="w-col w-col-2 sponsors-column"><img src="/build/images/charity4.png" class="sponsors-logo">
        </div>
        <div class="w-col w-col-2 sponsors-column"><img src="/build/images/sponsor1.png" class="sponsors-logo">
        </div>
        <div class="w-col w-col-2 sponsors-column"><img src="/build/images/charity2.png" class="sponsors-logo">
        </div>
      </div>
    </div><a href="#" class="w-button button red next">NEXT EXPEDITION</a>
    </div>
    <div class="divider"></div>
    @include('front.partials.footer')
@endsection
