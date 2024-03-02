<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class role extends Controller
{
    public function getAuthRole(){
      $role=Auth::user()->roles->pluck('name');
      return $role;
    }
}
