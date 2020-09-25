<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\okraski;

class okrasiController extends Controller
{
    //okrasi index
    public function okrasiIndex()
    {
        //get all skupine
        $skupine = DB::table('skupinas')->orderBy('created_at', 'desc')->get();

        //get all oblike
        $okrasi = DB::table('okraskis')->orderBy('created_at', 'desc')->get();

        return view('adminPanel.okrasi.okrasiIndex')->with('skupine', $skupine)->with('okrasi', $okrasi);
    }

    //add decoration
    public function dodajOkras(Request $request)
    {
        $okras = new okraski();
        $okras->name = $request->input('imeOkrasa');
        $okras->dimenzija = $request->input('dimenzija');
        $okras->save();
        return redirect()->back();
    }

    //edit okras index
    public function urediOkras($okrasID)
    {
        //find decoration
        $okras = okraski::find($okrasID);
        return view('adminPanel.okrasi.editOkras')->with('okras', $okras);
    }

    //edit okras exe
    public function urediOkrasExe(Request $request)
    {

        //find okras
        $okras = okraski::find($request->input('okrasID'));
        $okras->name = $request->input('imeOkrasa');
        $okras->save();
        return redirect('/dekori');
    }

    //delete okras exe
    public function deleteOkras($okrasID)
    {
        //find okras
        $okras = okraski::find($okrasID);
        $okras->delete();
        return redirect('/dekori');
    }
}
