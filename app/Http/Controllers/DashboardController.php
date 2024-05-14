<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $title = "dashboard page";
        $users = User::paginate(10);
        return view("admin.dashboard", compact("title", "users"));
    }
}
