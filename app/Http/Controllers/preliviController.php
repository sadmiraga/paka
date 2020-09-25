<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\preliv;

class preliviController extends Controller
{

    //prelivi index page
    public function preliviIndex()
    {
        //get all skupine
        $skupine = DB::table('skupinas')->orderBy('created_at', 'desc')->get();

        //get all oblike
        $prelivi = DB::table('prelivs')->orderBy('created_at', 'desc')->get();

        return view('adminPanel.prelivi.preliviIndex')->with('skupine', $skupine)->with('prelivi', $prelivi);
    }

    // add new topping
    public function addPreliv(Request $request)
    {
        $preliv = new preliv();
        $preliv->name = $request->input('imePreliva');
        $preliv->save();
        return redirect()->back();
    }

    //edit topping index
    public function editPreliv($prelivID)
    {
        //find topping
        $preliv = preliv::find($prelivID);

        return view('adminPanel.prelivi.editPreliv')->with('preliv', $preliv);
    }


    //edit topping execute
    public function editPrelivExe(Request $request)
    {
        //find topping
        $preliv = preliv::find($request->input('prelivID'));

        $preliv->name = $request->input('imePreliva');
        $preliv->save();
        return redirect('/prelivi');
    }

    public function deletePreliv($prelivID)
    {
        //find topping
        $preliv = preliv::find($prelivID);
        $preliv->delete();
        return redirect('/prelivi');
    }
}
