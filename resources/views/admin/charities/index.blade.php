@extends('admin.base')

@section('content')
    <div class="exp-page-header">
        <h1>Charities</h1>
        <div class="page-actions">
            <a href="/admin/charities/create">
                <div class="btn exp-btn">Add Charity</div>
            </a>
        </div>
        <hr/>
    </div>
    <section class="charity-index-view">
        @foreach($charities as $charity)
            <div class="sponsor-charity-card">
                <a href="/admin/charities/{{ $charity->id }}">
                    <img src="{{ $charity->thumbImage() }}" alt="sponsors image"/>
                    <p class="sponsor-charity-card-name">{{ $charity->name }}</p>
                    <p class="sponsor-charity-card-link">{{ $charity->site_link }}</p>
                </a>
            </div>
        @endforeach
    </section>
@endsection