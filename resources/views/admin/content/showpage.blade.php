@extends('admin.base')

@section('content')
    <div class="exp-page-header">
        <h1>{{ $page->name }} Page Editable Content</h1>
        <div class="page-actions">

        </div>
        <hr/>
    </div>
    <section class="editable-areas">
        @foreach($page->editableAreas as $area)
            <div class="editable-area-display">
                <h3 class="area-name">{{ $area->name }}</h3>
                <p class="area-content">{!! $area->content !!}</p>
                <a href="/admin/content/editable/{{ $area->id }}/edit" class="edit-content-link">
                    <div class="btn exp-btn btn-pale">Edit</div>
                </a>
            </div>
        @endforeach
    </section>
@endsection