<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Organization;
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
        $data = Organization::select(
                    'type',
                    DB::raw('COUNT(id) AS type_size')        
                )
                ->groupBy('type')
                ->orderBy('type_size', 'DESC')
                ->get();

        return view('home', compact('data'));
    }
}
