<?php

namespace App\Http\Controllers\Admin;

use App\Sponsor;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SponsorsOrderController extends Controller
{
    public function show()
    {
        $sponsors = Sponsor::ordered()->get();

        return view('admin.sponsors.order')->with(compact('sponsors'));
    }

    public function update(Request $request)
    {
        $this->validate($request, ['order' => 'required']);

        Sponsor::setOrder($request->order);

        return response()->json('ok');
    }
}
