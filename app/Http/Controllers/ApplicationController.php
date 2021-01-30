<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Inertia\Inertia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicationController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        // save users.last_login_at
        $user->last_login_at = Carbon::now();
        $user->save();
        // Application for admins
        if ($user->is_admin) {
            return redirect()->intended(route('admin.dashboard', 'login_dashboard'));
        }
        //
        return redirect()->intended(route('customer.dashboard', 'login_dashboard'));
    }

}
