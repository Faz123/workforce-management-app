<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HolidayController extends Controller
{
    public function whoIsOff()
    {
        return view('holiday.who-is-off');
    }
}
