<?php

namespace App\Http\Controllers;

use App\Newsletter\Subscriber;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class NewsletterController extends Controller
{
    public function subscribe(Request $request, Subscriber $subscriber)
    {
        $this->validate($request, ['email' => 'required|email']);

        return response()->json($subscriber->subscribe($request->email));

    }
}
