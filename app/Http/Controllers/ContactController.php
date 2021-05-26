<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index()
    {
        $string     =   "String value123";
        $integerValue = 123;
        $array  =   ['value 1', 'value 2', 'value 3'];
        $keyArray   =   [array('name' => 'Dileep Kr. Chaudhary', 'address' => 'Gatthaghar'),
                        array('name' => 'Dipesh', 'address' => 'Gatthaghar'),
                        array('name' => 'Binod', 'address' => 'Gatthaghar')];
        return view('contacts.index',compact('string', 'integerValue', 'array', 'keyArray'));
    }

    public function view()
    {
        return view('welcome');
    }
}
