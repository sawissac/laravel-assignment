<?php

namespace App\Http\Controllers;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:dashboard',['only'=>'index']);
    }

    public function index()
    {
        return view('backend.index');
    }
}
