@extends('admin.base')

@section('content')
    <div class="exp-page-header">
        <h1>{{ $expedition->name }} locations</h1>
        <div class="page-actions">
            <a href="/admin/expeditions/{{ $expedition->id }}">
                <div class="btn exp-btn">Back to Expedition</div>
            </a>
        </div>
        <hr/>
    </div>
    <div class="row">
        <div class="col-md-6">
            @foreach($expedition->locations as $location)
                <div class="location-box">
                    <header>{{ $location->title }}</header>
                    <div class="location-box-body">
                        <p><strong>Longitude: </strong>{{ $location->longitude }}</p>
                        <p><strong>latitude: </strong>{{ $location->latitude }}</p>
                    </div>
                    <footer class="clearfix">
                        <div class="footer-actions pull-right">
                            <a href="/admin/expeditions/{{ $expedition->id }}/locations/{{ $location->id }}/edit">
                                <div class="btn exp-btn">Edit</div>
                            </a>
                            @include('admin.partials.deletebutton', [
                                'objectName' => $expedition->title,
                                'deleteFormAction' => '/admin/locations/'.$location->id
                            ])
                        </div>
                    </footer>
                </div>
            @endforeach
        </div>
        <div class="col-md-6">
            <h2>Add a location</h2>
            @include('admin.forms.location', [
                'model' => $newLocation,
                'formAction' => '/admin/expeditions/' . $expedition->id . '/locations',
                'buttonText' => 'Add location'
            ])
        </div>
    </div>
    @include('admin.partials.deletemodal')

@endsection

@section('bodyscripts')
    @include('admin.partials.modalscript')
@endsection