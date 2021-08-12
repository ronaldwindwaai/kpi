<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('pages.dashboard.index')
            ->with('meetings', 53)
            ->with('registered', 53)
            ->with('projects', 53)
            ->with('programmes', 53)
            ->with('recordings', 53)
            ->with('support_request', 53);
    }
}
