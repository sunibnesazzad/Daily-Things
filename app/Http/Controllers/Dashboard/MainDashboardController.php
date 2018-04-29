<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Legal;
use App\Models\Privacy;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MainDashboardController extends Controller
{
    public function home()
    {
        return view('front.home')->with('title','Home');
        //return redirect()->route('dashboard.main');
    }

    public function dashboard()
    {
        return view('admin.dashboard.dashboard');

    }
}
