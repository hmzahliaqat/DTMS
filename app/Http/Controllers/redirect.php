<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class redirect extends Controller
{



    public function red()
    {

        $role = Auth::user()->roles->pluck('name')->first();

        switch ($role) {
            case 'hod_cs':
                return view('Dashboards.hod');
                break;

            case 'hod_eed':
                return view('Dashboards.hod');
                break;

            case 'hod_mth':
                return view('Dashboards.hod');
                break;

            case 'faculty':
                return view('Dashboards.faculty');
                break;

            case 'student':
                return view('Dashboards.student');
                break;
        }






    }



}
