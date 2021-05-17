<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Alert;

class ContactController extends Controller
{
    public function render()
    {
        $contacts = Contact::all();
        return view('admin.contact', compact('contacts'));
    }

    public function reply(Request $request, $id){
        $contacts = Contact::where('id', $id)->first();
        $contacts->reply = $request->reply;
        $contacts->update();
        alert()->success('Message sent successfully', 'Success');
        return redirect('/contact');
    }

    public function delete($id){
        $contacts = Contact::where('id', $id)->first();
        $contacts->delete();
        alert()->error('The message from the customer has been deleted', 'Deleted');
        return redirect('/contact');
    }
}
