<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function __construct(){
        $this->middleware(['auth', 'verified'])->except(['view_certificate']);
    }

    public function index(){
        return view('home');
    }
}
