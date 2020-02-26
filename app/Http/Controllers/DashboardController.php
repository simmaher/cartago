<?php

namespace App\Http\Controllers;
use App\Deals;
use App\News;
use App\Amenitys;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    { 
        $deals = Deals::all();
        $news = News::all();
        $amenitys = Amenitys::all();
        $d = $deals->count();
        $n = $news->count();
        $a = $amenitys->count();
      
        return view('dashboard.dashboard', ['d' => $d,'n' => $n,'a' => $a,'amenitys'=>$amenitys,'news'=>$news]);

    }
}
