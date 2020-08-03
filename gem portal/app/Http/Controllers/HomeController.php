<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Tnc;
use App\Access;
use Auth;

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
        $users=User::all();
        $terms=Tnc::all();
        $cont=User::count();
        $contt=Tnc::count();
        return view('home', compact('users', 'terms', 'cont', 'contt'));
    }

    public function bids()
    {
        $tncs = Tnc::whereIn('id', Access::select('tnc_id')->where('user_id', Auth::id())->get()->toArray())->get();
        return view('gem_bids', compact('tncs'));
    }
}
