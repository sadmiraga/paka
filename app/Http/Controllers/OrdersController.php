<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\skupina;
use App\oblika;
use App\dimension;
use App\okus;
use App\preliv;
use App\okraski;
use App\order;
use App\parts;
use Laravel\Ui\Presets\React;

class OrdersController extends Controller
{

    // get OBLIKA with ajax
    public function getOblikasList(Request $request)
    {
        $oblikasFetch = DB::table("oblikas")
            ->where("skupinaID", $request->skupinaID)
            ->pluck("name", "id");
        return response()->json($oblikasFetch);
    }

    //get OKUS with ajax
    public function getOkusList(Request $request)
    {

        $okusesFetch = DB::table("okuses")
            ->where("skupinaID", $request->skupinaID)
            ->pluck("name", "id");
        return response()->json($okusesFetch);
    }

    //get OKUS with ajax
    public function getSteviloKosovList(Request $request)
    {

        $kosiFetch = DB::table("parts")
            ->where("skupinaID", $request->skupinaID)
            ->pluck("steviloKosov", "id");
        return response()->json($kosiFetch);
    }



    public function step1()
    {
        //skupina data
        $skupinas = skupina::all();

        //oblika data
        $oblikas = oblika::all();

        //vse oblike razdeljene po skupinah
        $vsePriloznostiOblike = DB::table('oblikas')->where('skupinaID', 1)->get();
        $torteZaOtroke = DB::table('oblikas')->where('skupinaID', 2)->get();
        $torteIzPonudbe = DB::table('oblikas')->where('skupinaID', 3)->get();
        $porocneTorte = DB::table('oblikas')->where('skupinaID', 4)->get();

        //vsi okusi razdeljeni po skupinah
        $vsePriloznostiTaste = DB::table('okuses')->where('skupinaID', 1)->get();
        $torteZaOtrokeTaste = DB::table('okuses')->where('skupinaID', 2)->get();
        $torteIzPonudbeTaste = DB::table('okuses')->where('skupinaID', 3)->get();
        $porocneTorteTaste = DB::table('okuses')->where('skupinaID', 4)->get();






        //get all prelivs
        $prelivi = preliv::all();

        //get all okrasi
        $okraski = okraski::all();

        $parts = parts::all();




        return view('home')->with('skupinas', $skupinas)
            ->with('oblikas', $oblikas)->with('vsePriloznostiOblike', $vsePriloznostiOblike)
            ->with('torteZaOtroke', $torteZaOtroke)->with('torteIzPonudbe', $torteIzPonudbe)->with('porocneTorte', $porocneTorte)
            ->with('vsePriloznostiTaste', $vsePriloznostiTaste)
            ->with('torteZaOtrokeTaste', $torteZaOtrokeTaste)
            ->with('torteIzPonudbeTaste', $torteIzPonudbeTaste)
            ->with('porocneTorteTaste', $porocneTorteTaste)
            ->with('prelivi', $prelivi)
            ->with('okraski', $okraski)
            ->with('parts', $parts);
    }


    public function step2(Request $request)
    {
        $validate = $request->validate([
            'steviloTort' => 'required',
            'skupinaID' => 'required',
            'oblikaID' => 'required',
            'okusID' => 'required',
            'prelivID' => 'required',
            'dekorID' => 'required'
        ]);

        if ($request->input('steviloTort') == 0 || $request->input('skupinaID') == 0 || $request->input('oblikaID') == 0 || $request->input('okusID') == 0 || $request->input('prelivID') == 0 || $request->input('dekorID') == 0) {
            return redirect()->back()->with('error', 'Izberite pravilne opcije');
        }

        //make order
        $order = new order();

        $order->completed = 'no';
        $order->shipped = 'no';

        $order->napis = $request->input('tortniNapis');
        $order->komentar = $request->input('komentar');
        $order->steviloTort = $request->input('steviloTort');
        $order->skupinaID = $request->input('skupinaID');
        $order->okusID = $request->input('okusID');
        $order->prelivID = $request->input('prelivID');
        $order->oblikaID = $request->input('oblikaID');
        $order->okrasID = $request->input('dekorID');
        $order->partsID = $request->input('steviloKosovID');
        $order->save();

        return view('steps.step2')->with('orderID', $order->id);
    }

    public function step3(Request $request)
    {
        $validate = $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'phoneNumber' => 'required',
            'email' => 'required',
        ]);

        //find the order
        $orderToUpdate = order::find($request->input('orderID'));

        $orderToUpdate->ime = $request->input('firstName');
        $orderToUpdate->priimek = $request->input('lastName');
        $orderToUpdate->telefonskaStevilka = $request->input('phoneNumber');
        $orderToUpdate->elektronskiNaslov = $request->input('email');

        $orderToUpdate->save();

        return view('steps.step3')->with('orderID', $request->input('orderID'));
    }


    public function finish(Request $request)
    {

        $orderToFinish = order::find($request->input('orderID'));
        $orderToFinish->nacinPlacila = $request->input('payment');
        $orderToFinish->completed = 'yes';

        // get all groups and shapes
        $allShapes = oblika::all();
        $allGroups = skupina::all();

        $orderPrice = 0;

        //get the OBLIKA price
        foreach ($allShapes as $shape) {
            if ($shape->id == $orderToFinish->oblikaID) {
                $orderPrice = $orderPrice + $shape->cena;
            }
        }

        //get the SKUPINA price
        foreach ($allGroups as $group) {
            if ($group->id == $orderToFinish->skupinaID) {
                $orderPrice = $orderPrice + $group->cena;
            }
        }

        //insert price into database
        $orderToFinish->price = $orderPrice;

        $orderToFinish->save();
        return view('orders.thankyou');
    }


    public function orders()
    {
        $orders = DB::table('orders')->where('completed', 'yes')->get();

        if ($user = Auth::user()) {
            return view('orders.orders')->with('orders', $orders);
        } else {
            return 'Nimate dostopa do te strani';
        }
    }


    public function completeOrder($orderID)
    {
        $orderToDelete = order::find($orderID);
        $orderToDelete->delete();
        return redirect()->back();
    }
}
