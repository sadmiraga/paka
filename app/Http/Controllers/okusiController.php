<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\okus;

class okusiController extends Controller
{

    //taste index page
    public function okusi()
    {
        //get all skupine
        $skupine = DB::table('skupinas')->orderBy('created_at', 'desc')->get();

        //get all oblike
        $okusi = DB::table('okuses')->orderBy('created_at', 'desc')->get();

        return view('adminPanel.okusi.okusiIndex')->with('skupine', $skupine)->with('okusi', $okusi);
    }


    //add new taste
    public function addTaste(Request $request)
    {
        $okus = new okus();
        $okus->name = $request->input('imeOkusa');
        $okus->skupinaID = $request->input('skupinaID');
        $okus->save();
        return redirect()->back();
    }

    //edit taste index
    public function editTaste($okusID)
    {

        $okus = okus::find($okusID);
        return view('adminPanel.okusi.editOkus')->with('okus', $okus);
    }

    public function editTasteExe(Request $request)
    {
        //find taste
        $okus = okus::find($request->input('okusID'));
        $okus->name = $request->input('imeOkusa');
        $okus->save();
        return redirect('okusi');
    }

    public function deleteTaste($okusID)
    {
        $okus = okus::find($okusID);
        $okus->delete();
        return redirect('/okusi');
    }
}
