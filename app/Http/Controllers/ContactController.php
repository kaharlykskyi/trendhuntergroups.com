<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    public  function contact(Request $request)
    {
        $this->validate($request, [
            'full_name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'number' => 'required',
            'message' => 'required'
        ]);

        $res = Contact::create($request->all());

        if($res) {
            $msg = json_encode(['result' => "success", 'message' => "<strong>Success!</strong> Thanks for contacting us!"]);
        } else {
            $msg = json_encode(['result' => "error", 'message' => "<strong>Erorr!</strong> Please check form data!"]);
        }
        return $msg;
    }
}
