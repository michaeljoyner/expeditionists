<?php

namespace App\Http\Controllers;

use App\Events\VolunteerFormWasSubmitted;
use App\Http\Requests\VolunteerApplicationFormRequest;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class VolunteerApplicationsController extends Controller
{
    public function handleApplication(VolunteerApplicationFormRequest $request)
    {
        event(new VolunteerFormWasSubmitted($request));

        if($request->ajax()) {
            return response("received");
        }

        return redirect('getinvolved');
    }
}
