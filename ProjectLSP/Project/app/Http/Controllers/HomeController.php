<?php

namespace App\Http\Controllers;

use App\Models\Pengumuman;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $pengumuman = Pengumuman::all();
        return view('Dashboard',compact(['pengumuman']));
    }
}
