<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaylorsController extends Controller
{
    public function showTaylorProducts(){
        return view('taylors.products.index');
    }

    public function showTaylorClients(){
        return view('taylors.clients.index');
    }

    public function showTaylorsOrder(){
        return view('taylors.orders.index');
    }
}
