@extends('admin.base')

@section('content')
    <div class="exp-page-header">
        <h1>Add a new Video</h1>
        <hr/>
    </div>
    @include('admin.forms.video', [
        'video' => $video,
        'formAction' => '/admin/videos',
        'buttonText' => 'Add Video'
    ])
@endsection