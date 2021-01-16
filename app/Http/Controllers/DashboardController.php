<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Dashboard after user logged in
     *
     * @return void
     */
    public function dashboard()
    {
        $users = User::all();
        return view('dashboard', compact('users'));
        
    }
}
