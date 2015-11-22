{!! Form::model($model, ['url' => $formAction, 'class' => 'exp-form form-horizontal']) !!}
    <div class="form-group">
        <label for="name">Name: </label>
        {!! Form::text('name', null, ['class' => "form-control"]) !!}
    </div>
    <div class="form-group">
        <label for="site_link">Full Site Link (must iclude http:// or https://): </label>
        {!! Form::text('site_link', null, ['class' => "form-control"]) !!}
    </div>
    <div class="form-group">
        <button type="submit" class="btn exp-btn">{{ $buttonText }}</button>
    </div>
{!! Form::close() !!}