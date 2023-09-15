<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index() {
        return view('admin.admin');
    }

    public function dashboard(){
        return view('admin.dashboard');
    }

    // past

    // public function index() {
    //     return view('home');
    // }
    // public function index() {
    //     return view('welcome');
    // }
    // public function show() {
    //     return view('page2');
    // }
}
