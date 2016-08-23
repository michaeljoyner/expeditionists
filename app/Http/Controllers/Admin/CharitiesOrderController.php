<?php

namespace App\Http\Controllers\Admin;

use App\Charity;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class CharitiesOrderController extends Controller
{
    public function show()
    {
        $charities = Charity::ordered()->get();

        return view('admin.charities.order')->with(compact('charities'));
    }

    public function update(Request $request)
    {
        $this->validate($request, ['order' => 'required']);

        Charity::setOrder($request->order);

        return response()->json('ok');
    }
}
