@extends('admin.base')

@section('content')
    <div class="exp-page-header">
        <h1>Set the Team for {{ $expedition->name }}</h1>
        <hr/>
    </div>
    <section>
        @include('admin.forms.expeditionteam', ['formAction' => '/admin/expeditions/'.$expedition->id.'/teammembers', 'submitText' => 'Set Team'])
    </section>
@endsection