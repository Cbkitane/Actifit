<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //Routes for admin

    public function index()
    {
        $usersCount = User::count();
        $membersCount = User::where('role_id', '=', 4)->count();
        $trainersCount = User::where('role_id', '=', 3)->count();
        $staffCount = User::where('role_id', '=', 2)->count();
        $adminsCount = User::where('role_id', '=', 1)->count();

        return view('admin.index', [
            'usersCount' => $usersCount,
            'membersCount' => $membersCount,
            'trainersCount' => $trainersCount,
            'staffCount' => $staffCount,
            'adminsCount' => $adminsCount
        ]);
    }

    public function route_members()
    {
        return view('admin.members');
    }

    public function route_add_user()
    {
        return view('admin.add_user');
    }


    public function route_users()
    {
        return view('admin.users');
    }

    public function route_view_user()
    {
        return view('admin.view_user');
    }

    public function route_back()
    {
        return redirect()->back();
    }
}
