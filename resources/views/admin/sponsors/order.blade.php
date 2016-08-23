@extends('admin.base')

@section('head')
    <meta id="x-token" property="CSRF-token" content="{{ Session::token() }}"/>
@stop

@section('content')
    <div class="exp-page-header">
        <h1>Set the order of the Sponsors</h1>
        <div class="page-actions">
            <a href="/admin/sponsors">
                <div class="btn exp-btn">Back to Sponsors</div>
            </a>
        </div>
        <hr/>
    </div>
    <section id="sortable-list" class="container">
        <p class="lead">Drag and drop the sponsors into the order you wish them to appear on the site.
            <span v-cloak class="sync-indicator" v-bind:class="{'syncing' : syncs}">@{{ syncStateText }}</span>
        </p>
        <ul id="items" class="ordering-image-list">
            @foreach($sponsors as $sponsor)
                <li data-id="{{ $sponsor->id }}">
                    <img src="{{ $sponsor->thumbImage() }}" alt="">
                </li>
            @endforeach
        </ul>
    </section>
@endsection

@section('bodyscripts')
    <script src="/js/Sortable.js"></script>
    <script>
        new Vue({
            el: '#sortable-list',

            data: {
                sortable: null,
                syncs: 0
            },

            computed: {
                syncStateText: function () {
                    return this.syncs === 0 ? 'Synced' : 'Syncing';
                }
            },

            ready: function () {
                this.sortable = Sortable.create(document.getElementById('items'), {
                    onUpdate: this.postOrder
                });
            },

            methods: {
                postOrder: function () {
                    this.syncs = this.syncs + 1;
                    this.$http.post('/admin/patrons/order', {order: this.sortable.toArray()}, function (res) {
                        if (res === 'ok') {
                            this.syncs = this.syncs - 1;
                        }
                    });
                    console.log(this.sortable.toArray());
                }
            }
        });
    </script>
@endsection