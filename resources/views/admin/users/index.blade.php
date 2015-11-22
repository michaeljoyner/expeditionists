@extends('admin.base')

@section('content')
    <div class="exp-page-header">
        <h1>Users</h1>
        <div class="page-actions">
            <a href="/admin/register">
                <div class="btn exp-btn">Add User</div>
            </a>
        </div>
        <hr/>
    </div>
    <section class="users-index-section">
        @foreach($users as $user)
            <div class="user-card clearfix">
                <h3 class="user-card-name">{{ $user->name }}</h3>
                <p class="user-card-email">{{ $user->email }}</p>
                @if($user->hasRole('admin'))
                    <div class="user-card-admin-badge">
                        a
                    </div>
                @endif
                <div class="user-card-action-center pull-right">
                    <a href="/admin/users/{{ $user->id }}/edit">
                        <div class="btn exp-btn">Edit</div>
                    </a>
                    @include('admin.partials.deletebutton', [
                        'objectName' => $user->name,
                        'deleteFormAction' => '/admin/users/'.$user->id
                    ])
                </div>
            </div>
        @endforeach
    </section>
    @include('admin.partials.deletemodal')
@endsection

@section('bodyscripts')
    @include('admin.partials.modalscript')
@endsection