<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\skupina;





class AdminController extends Controller
{

    //Index page for admin Panel
    public function index()
    {
        //check if user is logged in
        if ($user = Auth::user()) {

            //check user role
            $userRole = Auth::user()->role;
            if ($userRole == 1) {
                return view('adminPanel');
            }
        } else {
            return 'Nimate dostopa do te strani, morate se <a href="/login"> prijaviti </a>';
        }
    }
}
