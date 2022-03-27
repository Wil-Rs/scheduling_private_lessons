<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Teachers;
use App\Models\Students;
use App\Models\Schedules;

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
        $teachers  = Teachers::all()->count();
        $students  = Students::all()->count();
        $schedules = Schedules::all()->count();
        return view('home.home', [
            'teachers' => $teachers,
            'students' => $students,
            'schedules' => $schedules
        ]);
    }
}
