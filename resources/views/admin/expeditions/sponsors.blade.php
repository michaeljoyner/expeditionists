@extends('admin.base')

@section('content')
    <div class="exp-page-header">
        <h1>Set Sponsors for {{ $expedition->name }}</h1>
        <hr/>
    </div>
    <section>
        @include('admin.forms.expeditionsponsors')
    </section>
@endsection