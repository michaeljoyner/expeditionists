<?php

namespace App\Http\Controllers\Admin;

use App\Http\FlashMessaging\Flasher;
use App\TeamMember;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class TeamMembersController extends Controller
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
        $members = TeamMember::ordered()->get();

        return view('admin.teammates.index')->with(compact('members'));
    }

    public function create()
    {
        $member = new TeamMember();

        return view('admin.teammates.create')->with(compact('member'));
    }

    public function store(Request $request)
    {
        if(! $request->user()->hasRole('admin')) {
            return abort(403, 'You do not have permission to perform that action');
        }

        $this->validateTeamMemberFormInput($request);

        TeamMember::create($request->only(['name', 'title', 'intro']));
        $this->flasher->success('Team Member Added', 'Growth is the most vital sign of life!');

        return redirect('admin/team');

    }

    public function edit($id)
    {
        $member = TeamMember::findOrFail($id);

        return view('admin.teammates.edit')->with(compact('member'));
    }

    public function update(Request $request, $id)
    {
        if(! $request->user()->hasRole('admin')) {
            return abort(403, 'You do not have permission to perform that action');
        }

        $this->validateTeamMemberFormInput($request);
        $member = TeamMember::findOrFail($id);

        $member->update($request->only(['name', 'title', 'intro']));

        $this->flasher->success('Member Info Updated', 'Congratulations');

        return redirect('admin/team');
    }

    public function delete(Request $request, $id)
    {
        if(! $request->user()->hasRole('admin')) {
            return abort(403, 'You do not have permission to perform that action');
        }

        $member = TeamMember::findOrFail($id);
        $member->delete();

        $this->flasher->success('Team Member Deleted', 'The team member was successfully removed from the team');

        return redirect('admin/team');
    }

    public function setProfilePic(Request $request, $id)
    {
        if(! $request->user()->hasRole('admin')) {
            return abort(403, 'You do not have permission to perform that action');
        }

        $this->validate($request, ['file' => 'required|image']);

        $member = TeamMember::findOrFail($id);
        $member->setProfilePic($request->file('file'));

        return response()->json('ok');
    }

    public function setTeamOrder(Request $request)
    {
        if(! $request->user()->hasRole('admin')) {
            return abort(403, 'You do not have permission to perform that action');
        }

        $this->validate($request, ['order' => 'required|array']);

        TeamMember::setNewOrder($request->order);

        return response()->json('ok');
    }

    protected function validateTeamMemberFormInput($request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'title' => 'required|max:255',
            'intro' => 'required'
        ]);
    }
}
