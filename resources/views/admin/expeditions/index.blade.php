@extends('admin.base')

@section('content')
    <div class="exp-page-header">
        <h1>Expeditions</h1>
        <div class="page-actions">
            <a href="/admin/expeditions/create">
                <div class="btn exp-btn">Add Expedition</div>
            </a>
        </div>
        <hr/>
    </div>
    <section class="expeditions-index-section">
        @foreach($expeditions as $expedition)
        <a href="/admin/expeditions/{{ $expedition->id }}">
            <div class="expedition-card">
                <img class="expedition_card_cover_pic" src="{{ $expedition->coverPic() }}" alt="expedition cover image"/>
                <h2 class="expedition-name">{{ $expedition->name }}</h2>
            </div>
        </a>
        @endforeach
    </section>
@endsection