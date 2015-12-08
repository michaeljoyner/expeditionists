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
        </div>
        <hr/>
    </div>
    <div class="row">
        <div class="col-md-7 expedition-profile-stats-area expedition-detail">
            <p><strong class="stat-label">Location: </strong>{{ $expedition->location }}</p>
            <p><strong class="stat-label">Start Date: </strong>{{ $expedition->start_date->toFormattedDateString() }}</p>
            <p><strong class="stat-label">About: </strong>{!! nl2br($expedition->about) !!}</p>
            <p><strong class="stat-label">Mission: </strong>{!! nl2br($expedition->mission) !!}</p>
            <p><strong class="stat-label">Objectives: </strong>{!! nl2br($expedition->objectives) !!}</p>
            <p><strong class="stat-label">Donation Goal: </strong>{{ $expedition->donation_goal }}</p>
            <hr/>
            <div class="row">
                <div class="expedition-show-team col-md-6">
                    <p>
                        <strong class="stat-label">Team: </strong>
                        <a href="/admin/expeditions/{{ $expedition->id }}/team" class="btn exp-btn btn-pale btn-small">Edit</a>
                    </p>
                    @foreach($expedition->expeditionists as $expeditionist)
                        <p>{{ $expeditionist->name }}</p>
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
        </div>
    </div>
    <section class="galleries">
        @foreach($expedition->galleries as $gallery)
            <h2>{{ $gallery->name }}</h2>
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

@endsection

@section('bodyscripts')
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