<?php

namespace App\Http\Controllers;

//use auth;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }


    public function index()
    {
        //dd( Auth::user()->email );
        return view('dashboard');
    }
}
