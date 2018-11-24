<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class CollectController
 * @package App\Http\Controllers
 */
class CollectController extends Controller
{
    //
    public function collect()
    {

        dump(bcrypt('365jia'));
        $orders = [[
            'id' => 9655,
            'oid' => 'ORDER9655',
            'name' => 'test',
            'status' => 'complete',
            'desc' => '',
            'products' => [
                ['id' => 96511, 'oname' => 'oid1', 'price' => 88],
                ['id' => 96511, 'oname' => 'oid1', 'price' => 99],
            ]
        ]];

        $sum = 0;
        foreach ($orders as $item) {
            foreach ($item['products'] as $itemp) {
                $sum += $itemp['price'];
            }
        }

        // dd($sum);
//        $data = collect($orders)->map(function ($order) {
//            // dd($order);
//            return $order['products'];
//        })->flatten(1)->map(function ($item) {
//            return $item['price'];
//        })->sum();

        // dump($data);
        dump(collect($orders)->flatMap(function ($order) {
            return $order['products'];
        })->sum('price'));
    }
}
