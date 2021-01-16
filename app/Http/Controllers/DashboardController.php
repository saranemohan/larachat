<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * Dashboard after user logged in
     *
     * @return void
     */
    public function dashboard()
    {
        $users = User::all()->except(Auth::id());
        return view('dashboard', compact('users'));
        
    }
}
