{!! Form::model($model, ['url' => $formAction, 'class' => 'exp-form form-horizontal']) !!}
    @include('errors')
    <div class="form-group">
        <label for="content">{{ $model->name }} </label>
        {!! Form::textarea('content', null, ['class' => 'form-control', 'id' => 'content-area']) !!}
    </div>
    <div class="form-group">
        <button type="submit" class="btn exp-btn">{{ $buttonText }}</button>
    </div>
{!! Form::close() !!}