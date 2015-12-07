<?php

namespace App\Http\Controllers\Admin;

use App\Expedition;
use App\Http\FlashMessaging\Flasher;
use App\Http\Requests\ExpeditionFormRequest;
use App\Http\Requests\ImageUploadRequest;
use App\Profile;
use App\Sponsor;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ExpeditionsController extends Controller
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
        $expeditions = Expedition::all();

        return view('admin.expeditions.index')->with(compact('expeditions'));
    }

    public function show($id)
    {
        $expedition = Expedition::findOrFail($id);

        return view('admin.expeditions.show')->with(compact('expedition'));
    }

    public function create()
    {
        $expedition = new Expedition();
        return view('admin.expeditions.create')->with(compact('expedition'));
    }

    public function store(ExpeditionFormRequest $request)
    {
        $expedition = Expedition::create($request->all());
        $expedition->addGallery('expedition gallery');

        $this->flasher->success('Expedition created', 'May it be a roaring success');

        return redirect('admin/expeditions');
    }

    public function edit($id)
    {
        $expedition = Expedition::findOrFail($id);

        return view('admin.expeditions.edit')->with(compact('expedition'));
    }

    public function update($id, ExpeditionFormRequest $request)
    {
        $expedition = Expedition::findOrFail($id);
        $expedition->update($request->all());

        $this->flasher->success('Expedition Saved', 'The expedition info has been updated');

        return redirect('admin/expeditions/'.$expedition->id);
    }

    public function delete($id)
    {
        $expedition = Expedition::findOrFail($id);
        $expedition->delete();

        $this->flasher->success('Expedition Deleted', 'That expedition has been erased from memory.');

        return redirect('admin/expeditions');
    }

    public function storeCoverPic($id, ImageUploadRequest $request)
    {
        $expedition = Expedition::findOrFail($id);

        $expedition->setCoverPic($request->file('file'));

        return response()->json('ok');
    }

    public function editSponsors($id)
    {
        $expedition = Expedition::findOrFail($id);
        $sponsors = Sponsor::all();

        return view('admin.expeditions.sponsors')->with(compact('expedition', 'sponsors'));
    }

    public function setSponsors($id, Request $request)
    {
        $sponsorIds = collect($request->expedition_sponsors)->map(function($item) {
            return intval($item);
        })->toArray();

        $expedition = Expedition::findOrFail($id);
        $expedition->syncSponsorsById($sponsorIds);

        $this->flasher->success('Sponsors Synced!', 'The sponsors for this expedition have been updated');

        return redirect('admin/expeditions/'.$expedition->id);
    }

    public function editTeam($id)
    {
        $expedition = Expedition::findOrFail($id);
        $profiles = Profile::all();

        return view('admin.expeditions.team')->with(compact('expedition', 'profiles'));
    }

    public function setTeam($id, Request $request)
    {
        $teamIds = collect($request->team_member)->map(function($item) {
            return intval($item);
        })->toArray();

        $expedition = Expedition::findOrFail($id);
        $expedition->syncTeamByIds($teamIds);

        $this->flasher->success('Team Members Set', 'The team for this expedition has been updated');

        return redirect('admin/expeditions/'.$expedition->id);
    }
}
