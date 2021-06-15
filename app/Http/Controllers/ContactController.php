<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $query      =    auth()->user()->contacts()->orderBy('created_at', 'desc');
        $key        =   '';
        if($request->has('key')){
            $query->where('name', 'like', '%'.$request->key.'%');
            $query->orWhereDate('created_at', $request->key);
            $key    =   $request->key;
        }

        $contacts       =   $query->paginate(5);
        return view('contacts.index',compact('contacts', 'key'));
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
            'phoneNumber'=> 'required',
            'profile'   => 'mimes:jpg,bmp,png'
        ]);

        $contact                =   new  Contact();
        $contact->name          =   $request->name;
        $contact->phone_number  =   $request->phoneNumber;
        $contact->email         =   ($request->has('email'))?$request->email:'';
        $contact->address       =   $request->address;
        $contact->user_id       =   auth()->user()->id;

        if($request->has('profile')){
            $imageName  =   time().".".$request->profile->extension();
            $folderPath     =   'files/profile';
            $request->profile->move(public_path($folderPath),$imageName);
            $contact->profile   =   $folderPath.'/'.$imageName;
        }

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
            'phoneNumber'=> 'required',
            'profile'   => 'mimes:jpg,bmp,png'
        ]);

        $contact    =   Contact::findOrFail($id);
        $contact->name          =   $request->name;
        $contact->phone_number  =   $request->phoneNumber;
        $contact->email         =   ($request->has('email'))?$request->email:'';
        $contact->address       =   $request->address;
        unlink($contact->profile);
        if($request->has('profile')){
            $imageName  =   time().".".$request->profile->extension();
            $folderPath     =   'files/profile';
            $request->profile->move(public_path($folderPath),$imageName);
            $contact->profile   =   $folderPath.'/'.$imageName;
        }

        $contact->save();

        return redirect('contacts');
    }
}
