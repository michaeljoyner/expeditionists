@extends('admin.base')

@section('head')
    <meta id="x-token" property="CSRF-token" content="{{ Session::token() }}"/>
@stop

@section('content')
    <div class="exp-page-header">
        <h1>{{ $charity->name }}</h1>
        <div class="page-actions">
            <a href="/admin/charities/{{ $charity->id }}/edit">
                <div class="btn exp-btn">Edit</div>
            </a>
            @include('admin.partials.deletebutton', [
                'objectName' => $charity->name,
                'deleteFormAction' => '/admin/charities/'.$charity->id
            ])
        </div>
        <hr/>
    </div>
    <section class="row charity-show">
        <div class="col-md-7">
            <p><strong>Name: </strong>{{ $charity->name }}</p>
            <p><strong>Link: </strong>{{ $charity->site_link }}</p>
            <p><strong>Description:</strong></p>
            <p>{!! nl2br($charity->description) !!}</p>
        </div>
        <div class="col-md-5 single-image-uploader-box">
            <div id="charity-uploader" class="sponsor-image-box">
                <singleupload default="{{ $charity->thumbImage() }}"
                              url="/admin/uploads/charities/{{ $charity->id }}/image"
                              shape="square"
                              size="small"
                ></singleupload>
            </div>
            <p>Charity images are mostly shown in thumbnail size, which are cropped to squares. For that reason it is recommended to upload a square image for best results.</p>
            <p>Note: The initial preview does not always show a true representation of the final outcome.</p>
        </div>
    </section>
    @include('admin.partials.deletemodal')
@endsection

@section('bodyscripts')
    <script>
        new Vue({
            el: '#charity-uploader'
        });
    </script>
    @include('admin.partials.modalscript')
@endsection