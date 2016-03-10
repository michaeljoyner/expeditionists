@extends('admin.base')

@section('head')
    <meta id="x-token" property="CSRF-token" content="{{ Session::token() }}"/>
@stop

@section('content')
    <div class="exp-page-header">
        <h1>File Resources</h1>
        <hr/>
    </div>
    <section class="file-resource-section">
        @foreach($files as $file)
            <div class="row file-resource-item">
                <div class="col-md-7">
                    <h3 class="file-title">{{ $file->name }}</h3>
                    <p class="lead">{{ $file->description }}</p>
                    @if(! $file->filename)
                        <p class="empty-resource-alert">No file has been uploaded for this resource yet</p>
                    @else
                        <p class="current-filename">{{ $file->filename }}</p>
                    @endif
                </div>
                <div class="col-md-5 single-image-uploader-box">
                    <pdfupload default="{{ $file->file_path ? '/images/assets/icons/doc_loaded.png' : '/images/assets/icons/doc_not_loaded.png' }}"
                               url="/admin/file-resources/{{ $file->id }}/uploads"
                               shape="square"
                               size="small"
                               uniqueid="{{ $file->id }}"
                    ></pdfupload>
                </div>
            </div>
        @endforeach
    </section>

@endsection

@section('bodyscripts')
    <script>
        new Vue({el: 'body'});
    </script>
@endsection