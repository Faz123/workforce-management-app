<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\AddStaffRequest;
use App\Models\User;
use App\Models\Shift;
use Illuminate\Support\Facades\Hash;

class StaffController extends Controller
{
    public function index()
    {
        return view('staff.addstaff');
    }

    public function manage()
    {
        return view('staff.manage')->with('users', User::all());
    }

    public function store(AddStaffRequest $request)
    {
        try {

            $user = new User();

            $user->name = $request->input('name');

            $user->surname = $request->input('surname');

            $user->email = $request->input('email');

            $user->role = $request->input('role');

            $user->contracted_hours = $request->input('contracted_hours');

            $user->holiday_allowance = $request->input('holiday_allowance');

            $user->store_code = $request->input('store_code');

            $user->staff_number = $request->input('staff_number');

            $user->password = Hash::make($request->input('password'));

            $user->save();

            $days = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
            for ($i = 0; $i < 7; $i++) {
                $shift = new Shift();

                $shift->shift_day = $days[$i];
                $shift->start_time = null;
                $shift->end_time = null;
                $shift->user_id = $user->id;
                $shift->save();
            }

            $request->session()->flash('flash.banner', 'Staff Member ' . $request->input('name') . ' ' . $request->input('surname') . ' Added!');
            $request->session()->flash('flash.bannerStyle', 'success');

            return redirect('/add-staff');
        } catch (\Illuminate\Database\QueryException $e) {

            $request->session()->flash('flash.banner', 'Uh oh, something went wrong.');
            $request->session()->flash('flash.bannerStyle', 'danger');

            return redirect('/add-staff');
        }
    }

    public function shifts(User $user, Shift $shift)
    {
        //if the current user has no shifts in the db, create them
        if (count($user->shifts) == '0') {
            $days = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
            for ($i = 0; $i < 7; $i++) {
                $shift = new Shift();

                $shift->shift_day = $days[$i];
                $shift->start_time = null;
                $shift->end_time = null;
                $shift->user_id = $user->id;
                $shift->save();
            }
        }
        return view('staff.edit-shifts')->with('user', $user);
    }

    public function edit(User $user)
    {
        return view('staff.edit')
            ->with('user', $user);
    }

    public function updateShifts(User $user, Request $request, Shift $shift)
    {
        $i = 0;
        foreach ($user->shifts as $shift) {
            $shift->shift_day = $request->input('shift_day')[$i];
            $shift->start_time = $request->input('start_time')[$i];
            $shift->end_time = $request->input('end_time')[$i];
            $shift->shift_type = $request->input('shift_type')[$i];
            $i++;
            $shift->save();
        }

        $request->session()->flash('flash.banner', 'Staff member shifts updated');
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect('/manage-staff/' . $user->id . '/shifts');
    }

    public function update(User $user, Request $request)
    {
        try {

            $user->name = $request->input('name');

            $user->surname = $request->input('surname');

            $user->email = $request->input('email');

            $user->role = $request->input('role');

            $user->contracted_hours = $request->input('contracted_hours');

            $user->holiday_allowance = $request->input('holiday_allowance');

            $user->store_code = $request->input('store_code');

            $user->staff_number = $request->input('staff_number');


            $user->save();

            $request->session()->flash('flash.banner', 'Staff member ' . $request->input('name') . ' ' . $request->input('surname') . '\'s details successfully updated!');
            $request->session()->flash('flash.bannerStyle', 'success');

            return redirect('/manage-staff/' . $user->id . '/edit');
        } catch (\Illuminate\Database\QueryException $e) {

            $request->session()->flash('flash.banner', 'Uh oh, something went wrong.');
            $request->session()->flash('flash.bannerStyle', 'danger');

            return redirect('/manage-staff/' . $user->id . '/edit');
        }
    }

    public function delete(User $user, Request $request)
    {
        $user->delete();

        $request->session()->flash('flash.banner', 'Staff Member Deleted! ????');
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect('/manage-staff');
    }
}
