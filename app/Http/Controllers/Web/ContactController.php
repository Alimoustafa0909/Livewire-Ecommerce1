<?php

namespace App\Http\Controllers\Web;

use App\Helpers;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        return view('web.contact.index');
    }

    public function store(ContactRequest $request)
  {
         $request->validated();
      (new Helpers)->contactMessage($request);
       return redirect(route('contact.index'))->with('success', 'Your message has been sent successfully!');

    }
}
