<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'nullable|string|max:255',
            'message' => 'required|string',
        ]);

        $contact = new Contact();
        $contact->fill($request->only(['name', 'email', 'subject', 'message']));

        $contact->save();

        return redirect()->route('contact')->with('success', 'Your message has been sent successfully!');
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);

        return view('user.contact-details', ['contact' => $contact]);

}
}
