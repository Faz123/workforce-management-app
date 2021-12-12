<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateRotaRequest;
use App\Models\Rota;
use App\Models\Settings;
use App\Models\Shift;
use App\Models\AdditionalShift;
use App\Models\Holiday;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Exports\RotasExport;
use Maatwebsite\Excel\Facades\Excel;


class ScheduleController extends Controller
{


    public function index()
    {
        $rotas = DB::table('rotas')->select('week_ending')->distinct()->get();
        return view('schedule.schedule')
            ->with('rotas', $rotas);
    }

    public function exportSchedule($date)
    {
        return (new RotasExport($date))->download('rota ' . $date . '.xlsx');
    }

    //home - dashboard view

    public function home()
    {
        // additional shifts
        $date = now();
        $weekEnd = $date->next('Saturday');
        $weekEnd = $weekEnd->toDateString();
        $additionalShifts = AdditionalShift::All();

        //schedule
        $settings = Settings::All();
        $settings->first();
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        //holiday
        $holidayRequests = DB::table('holidays')
            ->where('user_id', '=', Auth::user()->id)
            ->get();
        return view('home')
            ->with('additionalShifts', $additionalShifts)
            ->with('weekEnd', $weekEnd)
            ->with('rotas', $user->rotas->where('week_ending', $weekEnd))
            ->with('settings', $settings)
            ->with('holidayRequests', $holidayRequests);
    }

    public function generate()
    {
        return view('schedule.generate');
    }

    public function edit()
    {
        $rotas = DB::table('rotas')
            ->select('week_ending', 'week_number')
            ->distinct()
            ->get();

        return view('schedule.edit')
            ->with('rotas', $rotas);
    }

    public function editUserShifts($date)
    {
        $users = User::all();
        $rotas = Rota::all();
        return view('schedule.view-weekly-edit')
            ->with('rotas', $rotas)
            ->with('users', $users)
            ->with('date', $date);
    }

    public function updateRota(Request $request, $date)
    {
        // dd($request);
        $count = count($request->id);

        for ($i = 0; $i < $count; $i++) {
            $affected = DB::table('rotas')
                ->where('id', $request->input('id')[$i])
                ->update([
                    'shift_type' => $request->input('shift_type')[$i],
                    'start_time' => $request->input('start_time')[$i],
                    'end_time' => $request->input('end_time')[$i]
                ]);
        }

        $request->session()->flash('flash.banner', 'Rota updated');
        $request->session()->flash('flash.bannerStyle', 'success');

        return redirect('/schedule/edit-rota/' . $date);
    }

    public function current()
    {
        $date = now();
        $weekEnd = $date->next('Saturday');
        $weekEnd = $weekEnd->toDateString();
        $settings = Settings::All();
        $settings->first();
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        return view('schedule.current')
            ->with('rotas', $user->rotas->where('week_ending', $weekEnd))
            ->with('settings', $settings)
            ->with('weekEnd', $weekEnd);
    }

    public function viewWeekly()
    {
        $date = now();
        $weekEnd = $date->next('Saturday');
        $weekEnd = $weekEnd->toDateString();
        $settings = Settings::All();
        $settings->first();
        $rotas = Rota::all();
        $users = User::all();

        $haveRotas = false;
        if (count($rotas) > 0) {
            foreach ($rotas as $rota) {
                if ($rota->week_ending == $weekEnd) {
                    $haveRotas = true;
                }
            }
        }

        return view('schedule.view-weekly')
            ->with('settings', $settings)
            ->with('rotas', $rotas)
            ->with('users', $users)
            ->with('weekEnd', $weekEnd)
            ->with('haveRotas', $haveRotas);
    }

    public function create()
    {
        return view('schedule.create');
    }

    public function store(CreateRotaRequest $request, Shift $shift)
    {

        try {

            // dd($request);
            $shifts = Shift::all();

            if ($request->import_shifts === "on") {
                foreach ($shifts as $shift) {
                    $rota = new Rota();
                    $rota->user_id = $shift->user_id;
                    $rota->shift_day = $shift->shift_day;
                    $rota->shift_type = $shift->shift_type;
                    $rota->start_time = $shift->start_time;
                    $rota->end_time = $shift->end_time;
                    $rota->week_number = $request->input('week_number');
                    $rota->week_ending = $request->input('week_ending');
                    $rota->save();
                }
            } else {
                foreach ($shifts as $shift) {
                    $rota = new Rota();
                    $rota->user_id = $shift->user_id;
                    $rota->shift_day = $shift->shift_day;
                    $rota->shift_type = Null;
                    $rota->start_time = Null;
                    $rota->end_time = Null;
                    $rota->week_number = $request->input('week_number');
                    $rota->week_ending = $request->input('week_ending');
                    $rota->save();
                }
            }

            $request->session()->flash('flash.banner', 'Rota Created Successfully 🎉');
            $request->session()->flash('flash.bannerStyle', 'success');

            return redirect('/schedule/create');
        } catch (\Illuminate\Database\QueryException $e) {

            $request->session()->flash('flash.banner', 'Uh oh, something went wrong.');
            $request->session()->flash('flash.bannerStyle', 'danger');

            return redirect('/schedule/create');
        }
    }

    public function createAvailableShifts()
    {
        return view('schedule.create-additional-shifts');
    }

    public function addAvailableShifts(Request $request)
    {
        try {
            $additionalShift = new AdditionalShift();
            $additionalShift->shift_day = $request->input('shift_day');
            $additionalShift->start_time = $request->input('start_time');
            $additionalShift->end_time = $request->input('end_time');
            $additionalShift->shift_type = $request->input('additional_shift_type');
            $date = Carbon::createFromFormat('Y-m-d', $request->input('week_ending'));
            //if date is in the past return with error message
            if ($date->isPast()) {

                $request->session()->flash('flash.banner', 'Can not add an available shift for a previous week.');
                $request->session()->flash('flash.bannerStyle', 'danger');

                return redirect('/schedule/create-available-shifts');
            }
            $additionalShift->week_ending = $request->input('week_ending');
            $additionalShift->shift_filled = false;
            $additionalShift->save();

            $request->session()->flash('flash.banner', 'Additional Shift Added 🎉');
            $request->session()->flash('flash.bannerStyle', 'success');

            return redirect('/schedule/create-available-shifts');
        } catch (\Illuminate\Database\QueryException $e) {

            $request->session()->flash('flash.banner', 'Uh oh, something went wrong.');
            $request->session()->flash('flash.bannerStyle', 'danger');

            return redirect('/schedule/create-available-shifts');
        }
    }

    public function claimAvailableShift($shift)
    {
        $additionalShifts = AdditionalShift::all();
        $additionalShift = $additionalShifts->find($shift);

        return view('schedule.claim-shift')
            ->with('additionalShift', $additionalShift);
    }

    public function confirmShift(Request $request, $shift)
    {
        try {
            $additionalShifts = AdditionalShift::all();
            $additionalShift = $additionalShifts->find($shift);
            $additionalShift->user_id = Auth::user()->id;
            $additionalShift->shift_filled = true;
            $additionalShift->save();

            $request->session()->flash('flash.banner', 'Additional Shift Added 🎉');
            $request->session()->flash('flash.bannerStyle', 'success');

            return redirect('/home');
        } catch (\Illuminate\Database\QueryException $e) {

            $request->session()->flash('flash.banner', 'Uh oh, something went wrong.');
            $request->session()->flash('flash.bannerStyle', 'danger');

            return redirect('/schedule/claim-shift/' . $shift);
        }
    }

    public function agreedShifts()
    {
        if (Auth::user()->role === '3') {
            $additionalShifts = AdditionalShift::with('user')
                ->where('shift_filled', '=', true)
                ->get();
        } else {
            $additionalShifts = AdditionalShift::with('user')
                ->where('shift_filled', '=', true)
                ->where('user_id', '=', Auth::user()->id)
                ->get();
        }

        return view('schedule.agreed-shift')
            ->with('additionalShifts', $additionalShifts);
    }
}
