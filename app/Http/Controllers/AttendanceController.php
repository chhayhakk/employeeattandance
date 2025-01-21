<?php

namespace App\Http\Controllers;


use App\Models\User;
use Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Attandance;
use DateTime;

class AttendanceController extends Controller
{
    //
    public function clock_in(Request $request)
    {

        if ($request->ip() != '127.0.0.1') {
            return redirect()->back()->with('ip_error', true);
        }
        $user_id = $request->query('id');
        $current_clock_in = Attandance::where('user_id', $user_id)
            ->whereDate('clock_in', date(format: 'Y-m-d'))
            ->get();
        if (count($current_clock_in) > 0) {
            return redirect()->back()->with('clock_in_error', true);
        }

        $attendence = new Attandance();
        $attendence->user_id = $user_id;
        $attendence->clock_in = date(format: 'Y-m-d H:i:s');
        $attendence->clock_out = null;
        $attendence->clock_in_ip = $request->ip();
        $attendence->clock_out_ip = null;
        $attendence->save();

        return redirect()->route('dashboard')->with('success_clock_in', true);



        //        if ($user->save()){
        //            if (isset($request->profile)){
        //                $imageName = time().'.'.$request->profile->extension();
        //                $request->profile->move(public_path('images'), $imageName);
        //                $user->profile = $imageName;
        //                $user->save();
        //            }
        //        }


    }
    public function clock_out(Request $request)
    {
        if ($request->ip() != '127.0.0.1') {
            return redirect()->back()->with('ip_error', true);
        }

        $user_id = $request->query('id');

        // Retrieve the current clock-in record for the user
        $currentClockIn = Attandance::where('user_id', $user_id)
            ->whereDate('clock_in', now()->format('Y-m-d'))
            ->first();

        if (!$currentClockIn) {
            return redirect()->back()->with('clock_out_error', true);
        }

        // Update clock_out time and IP
        $currentClockIn->clock_out = date(format: 'Y-m-d H:i:s'); // Current date and time
        $currentClockIn->clock_out_ip = $request->ip();
        $currentClockIn->save();

        // Determine the next action based on whether the user has already clocked out today
        $clockedIn = ($currentClockIn->clock_out === null);

        // Redirect to dashboard with appropriate success message
        if ($clockedIn) {
            return redirect()->route('dashboard')->with('success_clock_in', true);
        } else {
            return redirect()->route('dashboard')->with('success_clock_out', true);
        }
    }
    public function show(Request $request)
    {
        $data = Attandance::join('users', 'users.id', '=', 'attendance.user_id')
            ->select(
                'attendance.*',
                'users.name',
                'users.role'
            )
            ->get();
        foreach ($data as $row) {
            $startHour = ('2024-01-01 7:00:00');
            $startDate = new DateTime($startHour);
            $endDate = new DateTime($row->clock_in);

            $interval = $startDate->diff($endDate);

            $hours = $interval->h;
            $minutes = $interval->i;
            $row->late = $hours . 'ម៉ោង' . $minutes . 'នាទី';
        }




        //$attendance = Attandance::all();
        // return view('user.attendance',compact('attendance'));
        return view('user.attendance', ['attendance' => $data]);
    }
    public function searchAttendance(Request $request)
    {
        $searchTerm = $request->input('search'); // Get the search term from the user input

        $data = Attandance::join('users', 'users.id', '=', 'attendance.user_id')
            ->select(
                'attendance.*',
                'users.name',
                'users.role'
            )
            ->where(function ($query) use ($searchTerm) {
                // Search by name or ID
                $query->where('users.name', 'like', '%' . $searchTerm . '%')
                    ->orWhere('users.id', $searchTerm);
            })
            ->get();

        foreach ($data as $row) {
            $startHour = '2024-01-01 07:00:00';
            $startDate = new DateTime($startHour);
            $endDate = new DateTime($row->clock_in);

            $interval = $startDate->diff($endDate);

            $hours = $interval->h;
            $minutes = $interval->i;
            $row->late = $hours . 'ម៉ោង' . $minutes . 'នាទី';
        }

        return view('user.attendance', ['attendance' => $data]);
    }
}
