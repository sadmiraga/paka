<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\skupina;
use App\oblika;
use App\okus;

class skupineController extends Controller
{
    //page with all groups and add group form
    public function skupine()
    {
        $skupinas = DB::table('skupinas')->orderBy('created_at', 'desc')->get();
        return view('adminPanel.skupine.skupine')->with('skupine', $skupinas);
    }


    public function addGroup(Request $request)
    {
        $skupina = new skupina();
        $skupina->name = $request->input('imeSkupine');
        $skupina->cena = $request->input('cenaSkupine');
        $skupina->save();
        return redirect()->back();
    }

    public function deleteGroup($skupinaID)
    {
        // za izbrisat OKUSI, oblike

        //izbrisi vse oblike ki so povezane na izbrano skupino
        oblika::where('skupinaID', $skupinaID)->delete();

        //izbrisati okuse ki so povezani na izbrano skupino
        okus::where('skupinaID', $skupinaID)->delete();

        $skupina = skupina::find($skupinaID);
        $skupina->delete();
        return redirect()->back();
    }

    public function editGroup($skupinaID)
    {
        //get group data
        $skupina = skupina::find($skupinaID);
        return view('adminPanel.skupine.editSkupina')->with('skupina', $skupina);
    }

    public function editGroupExe(Request $request)
    {
        //find group data
        $skupina = skupina::find($request->input('skupinaID'));
        $skupina->name = $request->input('imeSkupine');
        $skupina->cena = $request->input('cenaSkupine');
        $skupina->save();
        return redirect('/skupine');
    }
}
