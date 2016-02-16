@extends('admin.base')

@section('head')
    <meta id="x-token" property="CSRF-token" content="{{ Session::token() }}"/>
@stop

@section('content')
    <div class="exp-page-header">
        <h1>Team Members</h1>
        <div class="page-actions">
            <a href="/admin/team/members/create">
                <div class="btn exp-btn">Add Member</div>
            </a>
        </div>
        <hr/>
    </div>
    <section class="team-index-section">
        @foreach($members->chunk(3) as $memberRow)
            <div class="row">
                @foreach($memberRow as $member)
                    <div class="col-md-4 team-member-card single-image-uploader-box">
                        <singleupload default="{{ $member->profilePic() }}"
                                      url="/admin/uploads/team/members/{{ $member->id }}/profilepic"
                                      shape="round"
                                      size="small"
                                      uniqueid="{{ $member->id }}"
                        ></singleupload>
                        <h4 class="member-name">{{ $member->name }}</h4>
                        <h4 class="member-title">{{ $member->title }}</h4>
                        <p>{{ $member->intro }}</p>
                        <div class="member-actions">
                            <a href="/admin/team/members/{{ $member->id }}/edit">
                                <div class="btn exp-btn">Edit</div>
                            </a>
                            @include('admin.partials.deletebutton', [
                                'objectName' => $member->name,
                                'deleteFormAction' => '/admin/team/members/'.$member->id
                            ])
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </section>
    @include('admin.partials.deletemodal')
@endsection

@section('bodyscripts')
    <script>
        new Vue({
            el: 'body'
        });
    </script>
    @include('admin.partials.modalscript')
@endsection