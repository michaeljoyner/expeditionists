@extends('admin.base')

@section('content')
    <div class="exp-page-header">
        <h1>Update this video</h1>
        <hr/>
    </div>
    @include('admin.forms.video', [
        'video' => $video,
        'formAction' => '/admin/videos/' . $video->id,
        'buttonText' => 'Save Changes'
    ])
@endsection