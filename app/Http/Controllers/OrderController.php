<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller {
    public function index(){

    }

    public function create(){

    }

    public function show(){

    }

    public function edit(){

    }

    public function store(Request $request){
       $order = new Order();
       $order->client_id = $request->client_id;
       $order->product_id = $request->product_id;
       $order->save();
    }

    public function destroy(Order $order){
       $order->delete();
    }
}
