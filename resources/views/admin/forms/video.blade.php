{!! Form::model($video, ['url' => $formAction, 'class' => 'exp-form form-horizontal']) !!}
<div class="form-group">
    <label for="title">Title: </label>
    {!! Form::text('title', null, ['class' => "form-control", 'required' => true]) !!}
</div>
<div class="form-group">
    <label for="source">Link to video: </label>
    {!! Form::text('source', null, ['class' => "form-control", 'required' => true]) !!}
</div>
<div class="form-group">
    <label for="description">Description: </label>
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    <button type="submit" class="btn exp-btn">{{ $buttonText }}</button>
</div>
{!! Form::close() !!}