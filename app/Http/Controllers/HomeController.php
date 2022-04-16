<?php

namespace App\Http\Controllers;

use App\Models\Logger;
use App\Models\Muhasebe\MuhasebeFis;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {

        $logger=Logger::orderBy('created_at','desc')->limit(10)->get();
        return view('layouts.index',['logger'=>$logger]);
    }

    public function logout(){
        Auth::logout();
        return redirect("login");
    }

}
