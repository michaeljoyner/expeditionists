{!! Form::open(['url' => '/admin/users/password/reset', 'class' => 'exp-form form-horizontal']) !!}
    <div class="form-group">
        <label for="current_password">Current_password: </label>
        {!! Form::text('current_password', null, ['class' => "form-control"]) !!}
    </div>
    <div class="form-group">
        <label for="password">Password: </label>
        {!! Form::password('password', null, ['class' => "form-control"]) !!}
    </div>
    <div class="form-group">
        <label for="password_confirmation">Password confirmation: </label>
        {!! Form::password('password_confirmation', null, ['class' => "form-control"]) !!}
    </div>
    <div class="form-group">
        <button type="submit" class="btn exp-btn">Reset Password</button>
    </div>
{!! Form::close() !!}