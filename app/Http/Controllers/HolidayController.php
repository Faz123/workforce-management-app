<?php

namespace App\Http\Controllers;

use App\Http\Requests\HolidayRequest;
use App\Models\Holiday;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HolidayController extends Controller
{
    public function whoIsOff()
    {
        return view('holiday.who-is-off');
    }

    public function makeHolidayRequest()
    {
        return view('holiday.make-request');
    }

    public function saveHolidayRequest(HolidayRequest $request)
    {
        try {
            //get logged in user id
            $userId = auth()->user()->id;
            //create new holiday object
            $holiday = new Holiday();
            $holiday->start_day = $request->input('start_date');
            $holiday->end_day = $request->input('end_date');
            $holiday->approved = false;
            $holiday->status = 'submitted for approval';
            $holiday->notes = $request->input('notes');
            $holiday->user_id = $userId;
            $holiday->save();

            $request->session()->flash('flash.banner', 'Holiday dates submitted for approval 🎉');
            $request->session()->flash('flash.bannerStyle', 'success');

            return redirect('/holiday/make-request');
        } catch (\Illuminate\Database\QueryException $e) {
            $request->session()->flash('flash.banner', 'Uh oh, something went wrong.');
            $request->session()->flash('flash.bannerStyle', 'danger');
            return redirect('/holiday/make-request');
        }
    }

    public function viewRequests()
    {
        $holidayRequests = Holiday::all();
        return view('holiday.view-requests')
            ->with('holidayRequests', $holidayRequests);
    }

    public function manageRequests()
    {
        $holidayRequests = Holiday::all();
        return view('holiday.manage-requests')
            ->with('holidayRequests', $holidayRequests);
    }

    public function updateRequest(Request $request)
    {
        try {
            $affected = DB::table('holidays')
                ->where('id', $request->input('id'))
                ->update([
                    'approved' => $request->input('approved'),
                    'status' => $request->input('status')
                ]);
            $request->session()->flash('flash.banner', 'Holiday request succesfully updated');
            $request->session()->flash('flash.bannerStyle', 'success');

            return redirect('/holiday/manage-requests');
        } catch (\Illuminate\Database\QueryException $e) {
            $request->session()->flash('flash.banner', 'Uh oh, something went wrong.');
            $request->session()->flash('flash.bannerStyle', 'danger');
            return redirect('/holiday/manage-requests');
        }
    }
}
