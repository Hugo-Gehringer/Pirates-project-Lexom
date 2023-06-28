<?php

namespace App\Http\Controllers;

use App\Models\Ship;
use Illuminate\Contracts\Support\Renderable;
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
     * @return Renderable
     */
    public function index()
    {
        $user = auth()->user();
        $ship = $user->ship;
        $user->roles();
        return view('home')->with('ship',$ship);
    }
}
