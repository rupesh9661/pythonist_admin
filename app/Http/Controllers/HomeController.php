<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        return view('layouts.master');
    }
    public function dashboard()
    {
        $data['today_revenue']=0;
        $data['this_month_revenue']=0;
        $data['this_year_revenue']=0;

        return view('dashboard.index', compact('data'));
    }
}
