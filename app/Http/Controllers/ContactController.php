<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(){
        return view('admin.mastercontact');
    }
    public function create(){
        return view('admin.createcontact');
    }
    public function edit(){
        return view('admin.editcontact');
    }

    // public function index(){
    //     return view('contact');
    // }
}
