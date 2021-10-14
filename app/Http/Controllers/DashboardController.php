<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function defaultIndex()
    {
        return view('dashboard.index', ['page' => 'Dashboard']);
    }
}
