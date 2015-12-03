<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\Admin\RegisterFormRequest;
use App\Http\Requests\EditUserFormRequest;
use App\Http\Requests\PasswordResetFormRequest;
use App\User;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Input;

class UsersController extends Controller
{

    public function index()
    {
        $users = User::all();

        return view('admin.users.index')->with(compact('users'));
    }

    public function showRegister()
    {
        return view('admin.users.register');
    }

    public function postRegistration(RegisterFormRequest $request)
    {
        if(! $request->user()->hasRole('admin')) {
            return abort(403, 'You do not have permission to perform that action');
        }

        $user = User::create($request->all());

        if($request->get('is_admin', false)) {
            $user->assignRole('admin');
        }

        $user->addProfile();
        $user->profile->addGallery('my images');

        return redirect()->to('/');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('admin.users.edit')->with(compact('user'));
    }

    public function update($id, EditUserFormRequest $request)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->to('/admin/users');
    }

    public function delete($id, Request $request)
    {
        if(! $request->user()->hasRole('admin')) {
            return abort(403, 'You do not have permission to perform that action');
        }

        if(User::all()->count() < 2) {
            return redirect()->back()->withErrors(['delete' => 'Can not delete final user']);
        }
        
        $user = User::findOrFail($id);

        $user->delete();

        return redirect()->to('/admin/users');
    }

    public function showPasswordReset()
    {
        return view('admin.users.password');
    }

    public function doPasswordReset(PasswordResetFormRequest $request)
    {
        if(! Hash::check($request->current_password, $request->user()->password)) {
            return redirect()->back();
        }

        $user = User::findOrFail($request->user()->id);
        $user->password = $request->password;
        $user->save();

        return redirect('admin');
    }
}
