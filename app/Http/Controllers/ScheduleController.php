<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index() 
    {
        return view('schedule.test');
    }

    public function generate() 
    {
        return view('schedule.generate');
    }

    public function viewWeekly() 
    {
        return view('schedule.generate');
    }
}
