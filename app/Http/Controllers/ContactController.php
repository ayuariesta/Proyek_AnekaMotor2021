<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Alert;

class ContactController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $contacts = Contact::where('user_id', Auth::user()->id)->orderByRaw('id DESC')->get();
    	return view('contact', compact('contacts'));
    }

    public function save(Request $request)
    {
        $user = User::where('id', Auth::user()->id)->first();
        $contact = Contact::where('user_id', $user->id)->first();

        $contact = new Contact;
        $contact->user_id = $user->id;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->pesan = $request->pesan;
        $contact->save();
        alert()->success('Thank you for contact us');
        return redirect('contact');
    }

}
