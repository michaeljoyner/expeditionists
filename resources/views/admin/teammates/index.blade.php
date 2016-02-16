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
    <section class="team-index-section row">
        <div id="members-area" class="col-md-8">
        @foreach($members->chunk(2) as $memberRow)
            <div class="row">
                @foreach($memberRow as $member)
                    <div class="col-md-6 team-member-card single-image-uploader-box">
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
        </div>
        <div class="col-md-4" id="sortable-list">
            <h3>The order of the team</h3>
            <p>Drag and drop the names below into the order you want them to appear on the site.</p>
            <ul id="items" class="list-group team-sorting-list">
                @foreach($members as $member)
                    <li class="list-group-item" data-id="{{ $member->id }}">{{ $member->name }}</li>
                @endforeach
            </ul>
        </div>
    </section>
    @include('admin.partials.deletemodal')
@endsection

@section('bodyscripts')
    <script src="/js/Sortable.js"></script>
    <script>
        new Vue({
            el: '#members-area'
        });

        new Vue({
            el: '#sortable-list',

            data: {
                sortable: null
            },

            ready: function() {
                this.sortable = Sortable.create(document.getElementById('items'), {
                    onUpdate: this.postOrder
                });
            },

            methods: {
                postOrder: function() {
                    this.$http.post('/admin/team/order', {order: this.sortable.toArray()}, function(res) {
                       console.log(res);
                    });
                    console.log(this.sortable.toArray());
                }
            }
        });
    </script>
    @include('admin.partials.modalscript')

    <script>
        var el = document.getElementById('items');
        var sortable = Sortable.create(el, {
            onUpdate: function(ev) {
                console.log(ev);
            }
        });
    </script>
@endsection