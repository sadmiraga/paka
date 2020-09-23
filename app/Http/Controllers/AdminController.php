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


    //page with all groups and add group form
    public function skupine()
    {
        $skupinas = DB::table('skupinas')->orderBy('created_at', 'desc')->get();
        return view('adminPanel.skupine')->with('skupine', $skupinas);
    }


    public function addGroup(Request $request)
    {
        $skupina = new skupina();
        $skupina->name = $request->input('imeSkupine');
        $skupina->save();
        return redirect()->back();
    }

    public function deleteGroup($skupinaID)
    {
        $skupina = skupina::find($skupinaID);
        $skupina->delete();
        return redirect()->back();
    }

    public function editGroup($skupinaID)
    {
        return $skupinaID;
    }
}
