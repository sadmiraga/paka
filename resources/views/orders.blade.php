<?php
use App\okras;
use App\okus;
?>


@extends('layouts.orderLayout')
@section('content')
<table class="table">
    <thead>
      <tr>
        <th scope="col">Ime</th>
        <th scope="col">Priimek</th>
        <th scope="col">Telefonska Stevilka</th>
        <th scope="col">elektronski naslov</th>
        <th scope="col">nacin Placila</th>
        <th scope="col">Stevilo tort</th>
        <th scope="col">Okus</th>
        <th scope="col">preliv</th>
        <th scope="col">Oblik</th>
        <th scope="col">okras</th>
        <th scope="col">Cena</th>
        <th scope="col">Stevilo kosov</th>
        <th scope="col">#</th>
      </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
        <?php
            $okus = DB::table('okuses')->where('id',$order->okusID)->value('name');
            $preliv = DB::table('prelivs')->where('id',$order->prelivID)->value('name');
            $oblik = DB::table('oblikas')->where('id',$order->oblikaID)->value('name');
            $okras = DB::table('okraskis')->where('id',$order->okrasID)->value('name');
            $steviloKosov = DB::table('parts')->where('id',$order->partsID)->value('steviloKosov');


        ?>


            <tr>
                <td scope="row">{{$order->ime}}</td>
                <td>{{$order->priimek}}</td>
                <td>{{$order->telefonskaStevilka}}</td>
                <td>{{$order->elektronskiNaslov}}</td>
                <td>{{$order->nacinPlacila}}</td>
                <td>{{$order->steviloTort}}</td>
                <td>{{$okus}}</td>
                <td>{{$preliv}}</td>
                <td>{{$oblik}}</td>
                <td>{{$okras}}</td>
                <td>{{$order->price}}</td>

                <td>{{$steviloKosov}}</td>
                <td>
                    <button onclick="location.href='{{url('/ship/'.$order->id)}}'" class="btn btn-success"> Koncaj narocilo </button>
                </td>
            </tr>
        @endforeach
    </tbody>
  </table>


  <a class="dropdown-item" href="{{ route('logout') }}"
  onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
   {{ __('Logout') }}
</a>
@endsection
