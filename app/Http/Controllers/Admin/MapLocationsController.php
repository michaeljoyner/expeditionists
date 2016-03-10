<?php

namespace App\Http\Controllers\Admin;

use App\Expedition;
use App\MapLocation;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class MapLocationsController extends Controller
{
    public function index($expeditionId)
    {
        $newLocation = new MapLocation();
        $expedition = Expedition::with('locations')->findOrFail($expeditionId);

        return view('admin.expeditions.locations.index')->with(compact('newLocation', 'expedition'));
    }

    public function store(Request $request, $expeditionId)
    {
        $expedition = Expedition::findOrFail($expeditionId);
        $expedition->addLocation($request->all());

        return redirect('admin/expeditions/'.$expedition->id.'/locations');
    }

    public function edit($expeditionId, $locationId)
    {
        $location = MapLocation::findOrFail($locationId);

        return view('admin.expeditions.locations.edit')->with(compact('location'));
    }

    public function update(Request $request, $locationId)
    {
        $location = MapLocation::findOrFail($locationId);
        $location->update($request->all());

        return redirect('admin/expeditions/'.$location->expedition->id.'/locations');
    }

    public function delete($locationId)
    {
        $location = MapLocation::findOrFail($locationId);
        $expeditionId = $location->expedition->id;
        $location->delete();

        return redirect('admin/expeditions/'.$expeditionId.'/locations');
    }
}
