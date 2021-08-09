<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Settings;

class SettingsController extends Controller
{
    public function index(Settings $settings) 
    {
        $settings = Settings::firstOrCreate([
        
        'year_start_date' => null,

        'year_end_date' => null

        ]);

        $settings->save();

        $firstSettings = Settings::first();

        return view('app-settings.settings')->with('firstSettings', $firstSettings);
    }

    public function save(Request $request)
    {
        try {
            $settings = Settings::first();
       
            $settings->year_start_date = $request->input('start_date');

            $settings->year_end_date = $request->input('end_date');

            $settings->save();

            $request->session()->flash('flash.banner', 'Settings Saved!');
            $request->session()->flash('flash.bannerStyle', 'success');

            return redirect('/settings');
        }

        catch (\Illuminate\Database\QueryException $e) {

            $request->session()->flash('flash.banner', 'Uh oh, something went wrong.');
            $request->session()->flash('flash.bannerStyle', 'danger');
    
            return redirect('/settings');
            }
        
    }
}
