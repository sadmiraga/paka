<?php

use Illuminate\Support\Facades\Auth;


namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

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
            return 'Nimate dostopa do te strani, morate se prijaviti';
        }
    }


    //skupine index page
    public function skupine()
    {
        return 'all skupine here boiiii';
    }
}
