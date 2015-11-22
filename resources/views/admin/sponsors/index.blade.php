@extends('admin.base')

@section('content')
    <div class="exp-page-header">
        <h1>Sponsors</h1>
        <div class="page-actions">
            <a href="/admin/sponsors/create">
                <div class="btn exp-btn">Add Sponsor</div>
            </a>
        </div>
        <hr/>
    </div>
    <section class="sponsors-index-view">
        @foreach($sponsors as $sponsor)
            <div class="sponsor-charity-card">
                <a href="/admin/sponsors/{{ $sponsor->id }}">
                    <img src="{{ $sponsor->thumbImage() }}" alt="sponsors image"/>
                    <p class="sponsor-charity-card-name">{{ $sponsor->name }}</p>
                    <p class="sponsor-charity-card-link">{{ $sponsor->site_link }}</p>
                </a>
            </div>
        @endforeach
    </section>
@endsection