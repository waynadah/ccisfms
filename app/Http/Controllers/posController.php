<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class posController extends Controller
{
    public function index()
    {
        return view('controller.admin_role.pos');
    }
}
