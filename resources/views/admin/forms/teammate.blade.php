{!! Form::model($model, ['url' => $formAction, 'class' => 'exp-form form-horizontal']) !!}
<div class="form-group">
    <label for="name">Name: </label>
    {!! Form::text('name', null, ['class' => "form-control"]) !!}
</div>
<div class="form-group">
    <label for="title">Title: </label>
    {!! Form::text('title', null, ['class' => "form-control"]) !!}
</div>
<div class="form-group">
    <label for="intro">Intro: </label>
    {!! Form::textarea('intro', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    <button type="submit" class="btn exp-btn">{{ $buttonText }}</button>
</div>
{!! Form::close() !!}