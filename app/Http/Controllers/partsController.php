<?php

namespace App\Http\Controllers;

use App\parts;
use App\skupina;
use Illuminate\Http\Request;

class partsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skupine = skupina::all();
        $parts = parts::all();
        return view('adminPanel.parts.partsIndex')->with('parts', $parts)->with('skupine', $skupine);
    }

    public function create(Request $request)
    {
        $part = new parts();
        $part->steviloKosov = $request->input('steviloKosov');
        $part->skupinaID = $request->input('skupinaID');
        $part->save();
        return redirect()->back();
    }


    public function editIndex($partID)
    {
        $skupine = skupina::all();
        $part = parts::find($partID);
        return view('adminPanel.parts.partsEdit')->with('part', $part)->with('skupine', $skupine);
    }

    public function editPartExe(Request $request)
    {
        $part = parts::find($request->input('partID'));
        $part->steviloKosov = $request->input('steviloKosov');
        $part->skupinaID = $request->input('skupinaID');
        $part->save();
        return redirect('/kosi');
    }

    public function deletePart($partID)
    {
        $part = parts::find($partID);
        $part->delete();
        return redirect()->back();
    }
}
