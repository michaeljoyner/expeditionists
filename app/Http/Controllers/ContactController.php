<?php

namespace App\Http\Controllers;

use App\Content\Page;
use App\Http\Requests\ContactFormRequest;
use App\Mailing\AdminMailer;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{

    /**
     * @var AdminMailer
     */
    private $mailer;

    public function __construct(AdminMailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function show()
    {
        $page = Page::where('name', 'contact us')->firstOrFail();
        return view('front.pages.contact')->with(compact('page'));
    }

    public function postMessage(ContactFormRequest $request)
    {
        $this->mailer->sendContactMessage($request->all());

        if($request->ajax()) {
            return response()->json('ok');
        }

        return redirect('/');

    }
}
