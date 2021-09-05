<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ClientsController extends Controller
{
    public function showTaylors(){
        return view('clients.taylors.index');
    }

    public function showRequestOrders(){
        return view('clients.orders.index');
    }

}
