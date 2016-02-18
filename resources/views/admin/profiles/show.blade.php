@extends('admin.base')

@section('head')
    <meta id="x-token" property="CSRF-token" content="{{ Session::token() }}"/>
@stop

@section('content')
    <div class="exp-page-header">
        <h1>Your Profile</h1>
        <div class="page-actions">
            <a href="/admin/profiles/{{ $profile->id }}/edit">
                <div class="btn exp-btn">Edit</div>
            </a>
        </div>
        <hr/>
    </div>
    <div class="row">
        <div class="col-md-7 expedition-profile-stats-area profile-details">
            <p><strong class="stat-label">Name: </strong>{{ $profile->name }}</p>
            <p><strong class="stat-label">Intro: </strong>{{ $profile->intro }}</p>
            <p><strong class="stat-label">Age: </strong>{{ $profile->date_of_birth->age }}</p>
            <p><strong class="stat-label">Nationailty: </strong>{{ $profile->nationality }}</p>
            <p><strong class="stat-label">Residence: </strong>{{ $profile->residence }}</p>
            <p><strong class="stat-label">Atheltic Skills: </strong>{{ $profile->athletic_skills }}</p>
            <p><strong class="stat-label">Hero Status: </strong>{{ $profile->hero_status }}</p>
            <p><strong class="stat-label">Hero Statement: </strong>{{ $profile->hero_statement }}</p>
            <p><strong class="stat-label">Bio: </strong>{!! nl2br($profile->biography) !!}</p>
            <p><strong class="stat-label">Social Links:</strong></p>
            @include('admin.partials.sociallinks')
        </div>
        <div class="col-md-5 single-image-uploader-box">
            <div id="profile-pic">
                <singleupload default="{{ $profile->profilePic() }}"
                              url="/admin/uploads/profiles/{{ $profile->id }}/profilepic"
                              shape="round"
                              size="small"
                ></singleupload>
            </div>
            <p>The best size for a profile pic is a 2:3 (width to height) ratio, with your face bisected by the upper third line.</p><p>Note: The initial preview does not always represent the final outcome.</p>
        </div>
    </div>
    <section class="galleries">
        @foreach($profile->galleries as $gallery)
            <h2>{{ $gallery->name }}</h2>
            <a href="/admin/galleries/{{ $gallery->id }}/order">
                <div class="btn exp-btn">Arrange order</div>
            </a>
            <div id="gallery-app">
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
        var profileUploader = new Vue({
            el: '#profile-pic'
        });

        var gallery = new Vue({
            el: '#gallery-app',

            events: {
                'image-added': function(image) {
                    this.$broadcast('add-image', image);
                }
            }
        });
    </script>
@endsection