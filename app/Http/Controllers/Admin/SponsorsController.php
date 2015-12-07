<?php

namespace App\Http\Controllers\Admin;

use App\Http\FlashMessaging\Flasher;
use App\Http\Requests\ImageUploadRequest;
use App\Http\Requests\SponsorCharityFormRequest;
use App\Sponsor;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SponsorsController extends Controller
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

    public function update($id, SponsorCharityFormRequest $request)
    {
        $sponsor = Sponsor::findOrFail($id);
        $sponsor->update($request->all());

        $this->flasher->success('Sponsor Saved', 'The sponsor info has been saved');

        return redirect('admin/sponsors');
    }

    public function storeImage($id, ImageUploadRequest $request)
    {
        $sponsor = Sponsor::findOrFail($id);
        $image = $sponsor->setImage($request->file('file'));

        return response()->json($image);
    }

    public function delete($id)
    {
        $sponsor = Sponsor::findOrFail($id);
        $sponsor->delete();

        $this->flasher->success('Sponsor Deleted!', 'That sponsor has been deleted');

        return redirect('admin/sponsors');
    }
}
