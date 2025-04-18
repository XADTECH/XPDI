<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminUserManageController extends Controller
{
    public function getUser(){
        $all_user = User::where('role', 'user')->latest()->get();
        return view('backend.admin.user.all-user', compact('all_user'));
    }

    public function getInstructor(){
        $all_instructor = User::where('role', 'instructor')->where('status', '1')->latest()->get();
        return view('backend.admin.user.all-instructor', compact('all_instructor'));
    }


}
