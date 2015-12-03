{!! Form::open(['url' => 'admin/login', 'class' => 'exp-form narrow form-horizontal']) !!}
@include('errors')
<div class="form-group">
    <label for="email">Email address: </label>
    <input type="email" name="email" value="{{ Input::old('email') }}" class="form-control" autofocus/>
</div>
<div class="form-group">
    <label for="password">Password: </label>
    <input type="password" name="password" class="form-control"/>
</div>
<div class="form-group">
    <label for="remember_me">Remember me:
        <input type="checkbox" name="remember_me" id="remember_me">
    </label>
</div>
<div class="form-group">
    <button type="submit" class="btn exp-btn">Login</button>
</div>
{!! Form::close() !!}