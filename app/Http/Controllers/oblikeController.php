<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\oblika;
use App\skupina;

class oblikeController extends Controller
{

    //index page for shapes
    public function oblike()
    {

        //get all skupine
        $skupine = DB::table('skupinas')->orderBy('created_at', 'desc')->get();

        //get all oblike
        $oblike = DB::table('oblikas')->orderBy('created_at', 'desc')->get();


        return view('adminPanel.oblike.oblike')->with('skupine', $skupine)->with('oblike', $oblike);
    }


    //add new shape execute
    public function addOblika(Request $request)
    {

        $oblika = new oblika();
        $oblika->name = $request->input('imeOblike');
        $oblika->skupinaID = $request->input('skupinaID');
        $oblika->cena = $request->input('cenaOblike');
        $oblika->save();
        return redirect()->back();
    }

    //edit shape index
    public function editOblika($oblikaID)
    {
        $oblika = oblika::find($oblikaID);
        return view('adminPanel.oblike.editOblika')->with('oblika', $oblika);
    }

    //edit shape execute
    public function editOblikaExe(Request $request)
    {

        //find shape
        $changeOblika = oblika::find($request->input('oblikaID'));

        //change name for shape
        $changeOblika->name = $request->input('imeOblike');

        ///change price for shape
        $changeOblika->cena = $request->input('cenaOblike');

        $changeOblika->save();
        return redirect('/oblike');
    }


    //delete shape execute
    public function deleteOblika($oblikaID)
    {
        $deleteOblika = oblika::find($oblikaID);
        $deleteOblika->delete();
        return redirect('/oblike');
    }
}
