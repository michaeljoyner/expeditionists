<?php

namespace App\Http\Controllers;

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

    public function postMessage(ContactFormRequest $request)
    {
        $this->mailer->sendContactMessage($request->all());

        if($request->ajax()) {
            return response()->json('ok');
        }

        return redirect('/');

    }
}
