<?php

namespace App\Http\Controllers;

use App\Models\Stil;
use App\Models\Work;
use App\Models\Barber;

use Illuminate\Http\Request;

class FrontendController extends Controller
{

    public function index(){
        $works = Work::all();
        $stills = Stil::all();
        $barber = Barber::all();
        // dd($works);
        return view('index',compact('works','stills','barber'));
    }
    public function barbershop()
    {
        $barber = Barber::all();
        $stills = Stil::all();

        return view('barber-shop',compact('barber','stills'));
    }
}