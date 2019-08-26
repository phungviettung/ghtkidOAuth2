<?php

namespace App\Http\Controllers;

use App\App;

use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function getDashboard()
    {

        return view('admin.container.dashboard');
    }
    public function getUser()
    {
        $user_list= User::where('status',1)->paginate(12);
        return view('admin.container.user',compact('user_list'));
    }
    public function getApp()
    {
        $app_list= App::where('status',1)->paginate(12);

        return view('admin.container.app',compact('app_list'));
    }
}
