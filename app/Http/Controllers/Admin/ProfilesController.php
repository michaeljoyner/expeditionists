<?php

namespace App\Http\Controllers\Admin;

use App\Gallery;
use App\Profile;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class ProfilesController extends Controller
{
    public function show($id)
    {
        $profile = Profile::findOrFail($id);

        return view('admin.profiles.show')->with(compact('profile'));
    }

    public function edit($id)
    {
        $profile = Profile::with('user')->findOrFail($id);

        return view('admin.profiles.edit')->with(compact('profile'));
    }

    public function update($id, Request $request)
    {
        $profile = Profile::findOrFail($id);

        if(Gate::denies('manage-profile', $profile)) {
            return abort(403);
        }

        $profile->update($request->all());

        return redirect('admin');
    }

    public function storeProfilePic($id, Request $request)
    {
        $profile = Profile::findOrFail($id);
        $profile->setProfilePic($request->file('file'));

        return response('ok');
    }

    public function delete($id, Request $request)
    {
        $profile = Profile::findOrFail($id);

        if(Gate::denies('manage-profile', $profile)) {
            return abort(403);
        }

        $profile->delete();

        return redirect('admin');
    }
}
