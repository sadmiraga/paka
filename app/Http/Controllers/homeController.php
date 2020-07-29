<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\skupina;
use App\oblika;

class homeController extends Controller
{
    public function step1()
    {
        //skupina data
        $skupinas = skupina::all();

        //oblika data
        $oblikas = oblika::all();

        //vse priloznosti oblike
        $vsePriloznostiOblike = DB::table('oblikas')->where('skupinaID', 1)->get();
        $torteZaOtroke = DB::table('oblikas')->where('skupinaID', 2)->get();
        $torteIzPonudbe = DB::table('oblikas')->where('skupinaID', 3)->get();
        $porocneTorte = DB::table('oblikas')->where('skupinaID', 4)->get();

        return view('home')->with('skupinas', $skupinas)
            ->with('oblikas', $oblikas)->with('vsePriloznostiOblike', $vsePriloznostiOblike)
            ->with('torteZaOtroke', $torteZaOtroke)->with('torteIzPonudbe', $torteIzPonudbe)->with('porocneTorte', $porocneTorte);
    }


    public function step2($steviloTort)
    {
        return $steviloTort;
    }
}
