<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function showOrder(){
        $order = [
            'type' => 'art',
            'id' => '1',
            'customerName' => 'Anna',
            'customerSurname' => 'Jankowiak'
        ];

        return View('order', $order);
    }

    public function showOrderArray(){
        $order = [
            'type' => 'art',
            'id' => '1',
            'customerName' => 'Anna',
            'customerSurname' => 'Jankowiak'
        ];

        return View('orderarray', ['order'=>$order]);
    }
}
