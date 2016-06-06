@extends('admin.base')

@section('head')
    <meta id="x-token" property="CSRF-token" content="{{ Session::token() }}"/>
@stop

@section('content')
    <div class="exp-page-header">
        <h1>{{ $expedition->name }}</h1>
        <div class="page-actions">
            <a href="/admin/expeditions/{{ $expedition->id }}/edit">
                <div class="btn exp-btn">Edit</div>
            </a>
            <a href="/admin/expeditions/{{ $expedition->id }}/locations">
                <div class="btn exp-btn">Map Locations</div>
            </a>
            @include('admin.partials.deletebutton', [
                'deleteFormAction' => '/admin/expeditions/'.$expedition->id,
                'objectName' => $expedition->name
            ])
        </div>
        <hr/>
    </div>
    <div class="row">
        <div class="col-md-7 expedition-profile-stats-area expedition-detail">
            <p><strong class="stat-label">Location: </strong>{{ $expedition->location }}</p>
            <p><strong class="stat-label">Distance: </strong>{{ $expedition->distance_to_date }}km of {{ $expedition->distance }}km</p>
            <p><strong class="stat-label">Start Date: </strong>{{ $expedition->start_date->toFormattedDateString() }}</p>
            <p><strong class="stat-label">About: </strong>{!! nl2br($expedition->about) !!}</p>
            <p><strong class="stat-label">Mission: </strong>{!! nl2br($expedition->mission) !!}</p>
            <p><strong class="stat-label">Objectives: </strong>{!! nl2br($expedition->objectives) !!}</p>
            <p><strong class="stat-label">Donation Goal: </strong>{{ $expedition->donation_goal }}</p>
            <p><strong class="stat-label">Donations to Date: </strong>{{ $expedition->donation_to_date }}</p>
            <hr/>
            <div class="row">
                <div class="expedition-show-team col-md-6">
                    <p>
                        <strong class="stat-label">Expeditionists: </strong>
                        <a href="/admin/expeditions/{{ $expedition->id }}/team" class="btn exp-btn btn-pale btn-small">Edit</a>
                    </p>
                    @foreach($expedition->expeditionists as $expeditionist)
                        <p>{{ $expeditionist->name }}</p>
                    @endforeach
                    <p>
                        <strong class="stat-label">Support Team: </strong>
                        <a href="/admin/expeditions/{{ $expedition->id }}/teammembers/edit" class="btn exp-btn btn-pale btn-small">Edit</a>
                    </p>
                    @foreach($expedition->teamMembers as $member)
                        <p>{{ $member->name }}</p>
                    @endforeach
                </div>
                <div class="expedition-show-sponsors col-md-6">
                    <p>
                        <strong class="stat-label">Sponsors: </strong>
                        <a href="/admin/expeditions/{{ $expedition->id }}/sponsors" class="btn exp-btn btn-small btn-pale">Edit</a>
                    </p>
                    @foreach($expedition->sponsors as $sponsor)
                        <p>{{ $sponsor->name }}</p>
                    @endforeach
                    <p>
                        <strong class="stat-label">Charities: </strong>
                        <a href="/admin/expeditions/{{ $expedition->id }}/charities" class="btn exp-btn btn-small btn-pale">Edit</a>
                    </p>
                    @foreach($expedition->charities as $charity)
                        <p>{{ $charity->name }}</p>
                    @endforeach
                </div>
            </div>
        </div>
        <div class="col-md-5 single-image-uploader-box">
            <div id="cover-uploader">
                <singleupload default="{{ $expedition->coverPic() }}"
                              url="/admin/uploads/expeditions/{{ $expedition->id }}/coverpic"
                              shape="square"
                              size="large"
                ></singleupload>
            </div>
            <p>The best size cover image for an expedition is a 4:3 (width to height) ratio, and an image at least 500px across.</p>
            <p>Note: The initial preview does not always show a true representation of the final outcome.</p>
        </div>
    </div>
    <section class="galleries">
        @foreach($expedition->galleries as $gallery)
            <h2>{{ $gallery->name }}</h2>
            <a href="/admin/galleries/{{ $gallery->id }}/order">
                <div class="btn exp-btn">Arrange order</div>
            </a>
            <div id="expedition-gallery-app">
                <dropzone
                        url="/admin/uploads/galleries/{{ $gallery->id }}/images"
                        ></dropzone>
                <gallery-show
                        gallery="{{ $gallery->id }}"
                        geturl="/admin/uploads/galleries/{{ $gallery->id }}/images"
                        ></gallery-show>
            </div>
        @endforeach
    </section>
    @include('admin.partials.deletemodal')
@endsection

@section('bodyscripts')
    @include('admin.partials.modalscript')
    <script>
        new Vue({
            el: '#cover-uploader'
        });
        new Vue({
            el: '#expedition-gallery-app',

            events: {
                'image-added': function(image) {
                    this.$broadcast('add-image', image);
                }
            }
        });
    </script>
@endsection