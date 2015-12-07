<form class="form-horizontal exp-form" role="form" method="POST" action="/admin/users/register">
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    @include('errors')
    <div class="form-group">
        <label class="control-label">Name</label>
        <input type="text" class="form-control" name="name" value="{{ old('name') }}">
    </div>

    <div class="form-group">
        <label class="control-label">E-Mail Address</label>
        <input type="email" class="form-control" name="email" value="{{ old('email') }}">
    </div>

    <div class="form-group">
        <label for="is_admin">Give full admin permissions: </label>
        {!! Form::checkbox('is_admin', null, old('is_admin')) !!}
    </div>

    <div class="form-group">
        <label class="control-label">Password</label>
        <input type="password" class="form-control" name="password">
    </div>

    <div class="form-group">
        <label class="control-label">Confirm Password</label>
        <input type="password" class="form-control" name="password_confirmation">
    </div>

    <div class="form-group">
        <button type="submit" class="btn exp-btn">
            Register User
        </button>
    </div>
</form>