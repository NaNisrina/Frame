<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function master()
    {
        $item = Siswa::with('contact')->get();
        return view('admin.mastercontact', compact('item'));
    }

    // public function master(){
    //     return view('admin.mastercontact');
    // }
    // public function create(){
    //     return view('admin.createcontact');
    // }
    // public function edit(){
    //     return view('admin.editcontact');
    // }

    public function index(){
        return view('contact');
    }
}
