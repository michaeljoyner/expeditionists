{!! Form::open(['url' => '/applications/signup', 'class' => 'application-form', 'id' => 'application-form']) !!}
<div class="volunteer-choices">
    <p>I would like to be a:</p>
    <label for="volunteer_radio">
        <input type="radio" id="volunteer_radio" name="application_type" value="volunteer">
        <span class="choice">volunteer</span>
    </label>
    <label for="expeditionist_radio">
        <input type="radio" id="expeditionist_radio" name="application_type" value="expeditionist">
        <span class="choice">expeditionist</span>
    </label>
</div>
<div class="form-group">
    <label for="title">Title: </label>
    {!! Form::text('title', null, ['class' => "form-control"]) !!}
</div>
<div class="form-group">
    <label for="name">Name: </label>
    {!! Form::text('name', null, ['class' => "form-control"]) !!}
</div>
<div class="form-group">
    <label for="address">Address: </label>
    {!! Form::text('address', null, ['class' => "form-control"]) !!}
</div>
<div class="form-group">
    <label for="city">City: </label>
    {!! Form::text('city', null, ['class' => "form-control"]) !!}
</div>
<div class="form-group">
    <label for="country">Country: </label>
    {!! Form::text('country', null, ['class' => "form-control"]) !!}
</div>
<div class="form-group">
    <label for="date_of_birth">Date of Birth: </label>
    {!! Form::date('date_of_birth', null, ['class' => "form-control"]) !!}
</div>
<div class="form-group">
    <label for="email">Email: </label>
    {!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    <label for="phone">Phone: </label>
    {!! Form::text('phone', null, ['class' => "form-control"]) !!}
</div>
<div class="form-group">
    <label for="project">Area of interest: </label>
    {!! Form::textarea('project', null, ['class' => 'form-control', 'placeholder' => 'Please include the volunteer project or expedition you are interested in.']) !!}
</div>
<div class="form-group">
    <button type="submit" class="w-button exp-button">Apply</button>
</div>
{!! Form::close() !!}