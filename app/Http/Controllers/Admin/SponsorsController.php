<?php

namespace App\Http\Controllers\Admin;

use App\Sponsor;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SponsorsController extends Controller
{
    public function index()
    {
        $sponsors = Sponsor::all();
        return view('admin.sponsors.index')->with(compact('sponsors'));
    }

    public function show($id)
    {
        $sponsor = Sponsor::findOrFail($id);

        return view('admin.sponsors.show')->with(compact('sponsor'));
    }

    public function createNewDefaultSponsor()
    {
        $sponsor = Sponsor::create(['name' => 'new sponsor']);

        return redirect('admin/sponsors/'.$sponsor->id.'/edit');
    }

    public function edit($id)
    {
        $sponsor = Sponsor::findOrFail($id);

        return view('admin.sponsors.edit')->with(compact('sponsor'));
    }

    public function update($id, Request $request)
    {
        $sponsor = Sponsor::findOrFail($id);
        $sponsor->update($request->all());

        return redirect('admin/sponsors');
    }

    public function storeImage($id, Request $request)
    {
        $sponsor = Sponsor::findOrFail($id);
        $image = $sponsor->setImage($request->file('file'));

        return response()->json($image);
    }

    public function delete($id)
    {
        $sponsor = Sponsor::findOrFail($id);
        $sponsor->delete();

        return redirect('admin/sponsors');
    }
}
