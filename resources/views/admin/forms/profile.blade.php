{!! Form::model($model, ['url' => $formAction, 'class' => 'exp-form form-horizontal two-column', 'id' => 'profile-form']) !!}
    @include('errors')
<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="name">Name: </label>
            {!! Form::text('name', null, ['class' => "form-control"]) !!}
        </div>
        <div class="form-group">
            <label for="intro">Intro: </label>
            {!! Form::textarea('intro', null, ['class' => 'form-control ta-short']) !!}
        </div>
        <div class="form-group">
            <label for="date_of_birth">Date of Birth: </label>
            {!! Form::date('date_of_birth', $model->dateForForm(), ['class' => "form-control date-input", 'placeholder' => "YYYY-MM-DD"]) !!}
        </div>
        <div class="form-group">
            <label for="nationality">Nationality: </label>
            {!! Form::text('nationality', null, ['class' => "form-control"]) !!}
        </div>
        <div class="form-group">
            <label for="residence">Place of Residence: </label>
            {!! Form::text('residence', null, ['class' => "form-control"]) !!}
        </div>
        <div class="form-group">
            <label for="athletic_skills">Athletic skills: </label>
            {!! Form::text('athletic_skills', null, ['class' => "form-control"]) !!}
        </div>
        <div class="form-group">
            <label for="hero_status">Hero Status: </label>
            {!! Form::text('hero_status', null, ['class' => "form-control"]) !!}
        </div>

    </div>
    <div class="col-md-6">
        <h3>Social Links</h3>
        <p class="form-note">Leave an item blank if you don't want that social link shown for your profile.</p>
        <div class="form-group">
            <label for="facebook">Facebook: </label>
            {!! Form::text('facebook', null, ['class' => "form-control"]) !!}
        </div>
        <div class="form-group">
            <label for="twitter">Twitter: </label>
            {!! Form::text('twitter', null, ['class' => "form-control"]) !!}
        </div>
        <div class="form-group">
            <label for="instagram">Instagram: </label>
            {!! Form::text('instagram', null, ['class' => "form-control"]) !!}
        </div>
        <div class="form-group">
            <label for="linkedin">Linkedin: </label>
            {!! Form::text('linkedin', null, ['class' => "form-control"]) !!}
        </div>
        <div class="form-group">
            <label for="email">Email: </label>
            {!! Form::text('email', null, ['class' => "form-control"]) !!}
        </div>
    </div>
</div>
<div class="form-group">
    <label for="hero_statement">Hero statement: </label>
    {!! Form::textarea('hero_statement', null, ['class' => 'form-control ta-short']) !!}
</div>
<div class="form-group">
    <label for="biography">Bio: </label>
    {!! Form::textarea('biography', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    <button type="submit" class="btn exp-btn">{{ $buttonText }}</button>
</div>
{!! Form::close() !!}