<?php

namespace App\Http\Controllers\Admin;

use App\Charity;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CharitiesController extends Controller
{
    public function index()
    {
        $charities = Charity::all();

        return view('admin.charities.index')->with(compact('charities'));
    }

    public function show($id)
    {
        $charity = Charity::findOrFail($id);

        return view('admin.charities.show')->with(compact('charity'));
    }

    public function createNewDefaultCharity()
    {
        $charity = Charity::create(['name' => 'new charity']);

        return redirect('admin/charities/'.$charity->id.'/edit');
    }

    public function edit($id)
    {
        $charity = Charity::findOrFail($id);

        return view('admin.charities.edit')->with(compact('charity'));
    }

    public function update($id, Request $request)
    {
        $charity = Charity::findOrFail($id);
        $charity->update($request->all());

        return redirect('admin/charities');
    }

    public function storeImage($id, Request $request)
    {
        $charity = Charity::findOrFail($id);

        $image = $charity->setImage($request->file('file'));

        return response()->json($image);

    }

    public function delete($id)
    {
        $charity = Charity::findOrFail($id);

        $charity->delete();

        return redirect('admin/charities');
    }
}
