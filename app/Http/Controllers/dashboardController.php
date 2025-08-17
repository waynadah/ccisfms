<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class dashboardController extends Controller
{
    public function index()
    {
        return view('controller.student_role.dashboard');
     
    }
   
}
