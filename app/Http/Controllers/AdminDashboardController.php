<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class AdminDashboardController extends Controller
{
    public function admin_index($name = null)
    {
        return Inertia::render('Admin/Dashboard');
    }
}
