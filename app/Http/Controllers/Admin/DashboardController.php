<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function user(){
        $users = User::orderBy('id', 'desc')->paginate(10);
        return view('admin.user.index', compact('users'));
    }

    public function userDetails($id){

        $user = User::find($id);
        return view('admin.user.view', compact('user'));
    }
}
