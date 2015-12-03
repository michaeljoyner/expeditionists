<?php

namespace App\Http\Controllers\Admin;

use App\Expedition;
use App\Http\Requests\ExpeditionFormRequest;
use App\Http\Requests\ImageUploadRequest;
use App\Profile;
use App\Sponsor;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ExpeditionsController extends Controller
{
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

        return redirect('admin');
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

        return redirect('admin/expeditions/'.$expedition->id);
    }

    public function delete($id)
    {
        $expedition = Expedition::findOrFail($id);
        $expedition->delete();

        return redirect('admin');
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

        return redirect('admin/expeditions/'.$expedition->id);
    }
}
