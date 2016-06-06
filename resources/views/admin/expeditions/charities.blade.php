@extends('admin.base')

@section('content')
    <div class="exp-page-header">
        <h1>Set Charities for {{ $expedition->name }}</h1>
        <hr/>
    </div>
    <section>
        @include('admin.forms.expeditioncharities')
    </section>
@endsection