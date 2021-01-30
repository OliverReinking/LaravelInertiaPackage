<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class CustomerDashboardController extends Controller
{
    public function customer_index($name = null)
    {
        return Inertia::render('Customer/Dashboard');
    }
}
