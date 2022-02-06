<?php

namespace App\Http\Controllers;
use App\Models\Stil;
use App\Models\Work;
use App\Models\Barber;


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
        $user = auth()->user();
        $role = $user->role; 
        $works = Work::all();
        $stills = Stil::all();
        $barbers = Barber::all();
        // dd($role);
        return view('home',compact('role','works','stills','barbers'));
    }
}
