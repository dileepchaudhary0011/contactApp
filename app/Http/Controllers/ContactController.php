<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts   =   Contact::where('user_id',auth()->user()->id)->get();
        return view('contacts.index',compact('contacts'));
    }

    public function view($id)
    {
        $contact    =   Contact::findOrFail($id);
        return view('contacts.view',compact('contact'));
    }

    public function create(){
        return view('contacts.create');
    }

    public function store(Request $request){
        $validated = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phoneNumber'=> 'required'
        ]);

        $contact                =   new  Contact();
        $contact->name          =   $request->name;
        $contact->phone_number  =   $request->phoneNumber;
        $contact->email         =   ($request->has('email'))?$request->email:'';
        $contact->address       =   $request->address;
        $contact->user_id       =   auth()->user()->id;
        $contact->save();

        return redirect('contacts');
    }

    public function destroy($id){
        $contact    =   Contact::findOrFail($id);
        $contact->delete();

        return redirect('contacts');
    }

    public function edit($id){
        $contact    =   Contact::findOrFail($id);

        return view('contacts.edit', compact('contact'));
    }

    public function update($id, Request $request )
    {
        $validated = $request->validate([
            'name' => 'required',
            'address' => 'required',
            'phoneNumber'=> 'required'
        ]);

        $contact    =   Contact::findOrFail($id);
        $contact->name          =   $request->name;
        $contact->phone_number  =   $request->phoneNumber;
        $contact->email         =   ($request->has('email'))?$request->email:'';
        $contact->address       =   $request->address;
        $contact->save();

        return redirect('contacts');
    }
}
