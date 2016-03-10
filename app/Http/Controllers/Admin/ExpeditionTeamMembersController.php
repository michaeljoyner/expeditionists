<?php

namespace App\Http\Controllers\Admin;

use App\Expedition;
use App\Http\FlashMessaging\Flasher;
use App\TeamMember;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ExpeditionTeamMembersController extends Controller
{
    /**
     * @var Flasher
     */
    private $flasher;

    public function __construct(Flasher $flasher)
    {
        $this->flasher = $flasher;
    }

    public function edit($id)
    {
        $expedition = Expedition::findOrFail($id);
        $profiles = TeamMember::all();

        return view('admin.expeditions.teammembers')->with(compact('expedition', 'profiles'));
    }

    public function setTeam($id, Request $request)
    {
        $teamIds = collect($request->team_member)->map(function($item) {
            return intval($item);
        })->toArray();

        $expedition = Expedition::findOrFail($id);
        $expedition->syncTeamMembers($teamIds);

        $this->flasher->success('Team Members Set', 'The team for this expedition has been updated');

        return redirect('admin/expeditions/'.$expedition->id);
    }
}
