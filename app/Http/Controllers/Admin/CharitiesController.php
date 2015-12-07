<?php

namespace App\Http\Controllers\Admin;

use App\Charity;
use App\Http\FlashMessaging\Flasher;
use App\Http\Requests\ImageUploadRequest;
use App\Http\Requests\SponsorCharityFormRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CharitiesController extends Controller
{
    /**
     * @var Flasher
     */
    private $flasher;

    public function __construct(Flasher $flasher)
    {
        $this->flasher = $flasher;
    }

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

    public function update($id, SponsorCharityFormRequest $request)
    {
        $charity = Charity::findOrFail($id);
        $charity->update($request->all());

        $this->flasher->success('Charity Saved', 'The charity info has been saved');

        return redirect('admin/charities');
    }

    public function storeImage($id, ImageUploadRequest $request)
    {
        $charity = Charity::findOrFail($id);

        $image = $charity->setImage($request->file('file'));

        return response()->json($image);

    }

    public function delete($id)
    {
        $charity = Charity::findOrFail($id);

        $charity->delete();

        $this->flasher->success('Charity Deleted', 'The charity has been deleted fro the system');

        return redirect('admin/charities');
    }
}
