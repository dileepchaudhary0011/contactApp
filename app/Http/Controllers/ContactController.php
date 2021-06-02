<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $contacts   =   Contact::get();

        $string     =   "String value123";
        $integerValue = 123;
        $array  =   ['value 1', 'value 2', 'value 3'];
        $keyArray   =   [array('name' => 'Dileep Kr. Chaudhary', 'address' => 'Gatthaghar'),
                        array('name' => 'Dipesh', 'address' => 'Gatthaghar'),
                        array('name' => 'Binod', 'address' => 'Gatthaghar')];
        return view('contacts.index',compact('string', 'integerValue', 'array', 'keyArray', 'contacts'));
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
        $contact->save();

        return redirect('contacts');
    }
}
