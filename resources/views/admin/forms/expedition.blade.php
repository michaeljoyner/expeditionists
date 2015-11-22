{!! Form::model($model, ['url' => $formAction, 'class' => 'exp-form form-horizontal two-column']) !!}
    @include('errors')
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Name: </label>
            {!! Form::text('name', null, ['class' => "form-control"]) !!}
        </div>
        <div class="form-group">
            <label for="location">Location: </label>
            {!! Form::text('location', null, ['class' => "form-control"]) !!}
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="start_date">Start Date: </label>
            {!! Form::date('start_date', null, ['class' => "form-control"]) !!}
        </div>
        <div class="form-group">
            <label for="donation_goal">Donation goal: </label>
            {!! Form::text('donation_goal', null, ['class' => "form-control"]) !!}
        </div>
    </div>
</div>
<div class="form-group">
    <label for="intro">Intro: </label>
    {!! Form::textarea('intro', null, ['class' => 'form-control ta-short']) !!}
</div>

<div class="form-group">
    <label for="about">About: </label>
    {!! Form::textarea('about', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    <label for="mission">Mission: </label>
    {!! Form::textarea('mission', null, ['class' => 'form-control ta-short']) !!}
</div>
<div class="form-group">
    <label for="objectives">Objectives: </label>
    {!! Form::textarea('objectives', null, ['class' => 'form-control ta-short']) !!}
</div>
<div class="form-group">
    <button type="submit" class="btn exp-btn">{{ $buttonText }}</button>
</div>
{!! Form::close() !!}