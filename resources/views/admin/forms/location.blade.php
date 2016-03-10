{!! Form::model($model, ['url' => $formAction, 'class' => 'exp-form location-form form-horizontal']) !!}
<div class="form-group">
    <label for="title">Title: </label>
    {!! Form::text('title', null, ['class' => "form-control"]) !!}
</div>
<div class="form-group">
    <label for="longitude">Longitude: <span class="label-extra-detail">(WEST is -90 to 0 EAST is 0 to 90)</span></label>
    {!! Form::text('longitude', null, ['class' => "form-control"]) !!}
</div>
<div class="form-group">
    <label for="latitude">Latitude: (SOUTH is -90 to 0 NORTH is 0 to 90)</label>
    {!! Form::text('latitude', null, ['class' => "form-control"]) !!}
</div>
<div class="form-group">
    <button type="submit" class="btn exp-btn">{{ $buttonText }}</button>
</div>
{!! Form::close() !!}