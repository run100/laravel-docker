<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * Class CollectController
 * @package App\Http\Controllers
 */
class CollectController extends Controller
{

    public function test2()
    {
        // $scores = file_get_contents('https://api.github.com/users/run100/events');
        //$json = json_decode(file_get_contents(public_path('events.json')), true);
        // dump($json);

//        $scoresum = collect($json)->pluck('type')->map(function ($eventType) {
//            return  collect([
//                'ForkEvent'=>5,
//                'WatchEvent'=>4,
//                'PushEvent'=>3
//            ])->get($eventType, 1);
//        })->sum();
//
//        dump($scoresum);
        array_map();
        $thisYear = [
            1 => 123,
            2 => 456,
            3 => 789
        ];

        $lastyear = [
            1 => 122,
            2 => 278,
            3 => 1000
        ];

//        $profit = [];
//        foreach ($thisYear as $key => $item) {
//            $profit[] = $item-$lastyear[$key];
//        }

        $profit = collect($thisYear)->zip($lastyear)->map(function ($item) {
            return $item->first() - $item->last();
        });

        print_r($profit);

        return response(date('Y-m-d H:i:s'));
    }

    //
    public function collect2()
    {
        $gates = [
            'Test_A1',
            'Test_b1',
            'Test_c1',
            'Test_d2',
            'e2',
            'Test_f1',
        ];
        $test = [
            1        => 'adsf',
            129031   => 'asdf',
            '123123' => 'sadfasdf'
        ];
        $file = 'aa';
        $file = 'aa';
        $file = 'aa';
        $file = 'aa';
        dd(collect($gates)->map(function ($gate) {
//            if (strrpos($gate, '_') === false) {
//                return $gate;
//            }
//            // return strrpos($gate, '_');
//            $offset = strrpos($gate, '_') + 1;
//            return mb_substr($gate, $position);
//            $items = explode('_', $gate);
//            return end($items);
            return collect(explode('_', $gate))->last();
        })->flatten(1));
        // dd($gates);


        // dump(bcrypt('365jia'));
//        $orders = [[
//            'id' => 9655,
//            'oid' => 'ORDER9655',
//            'name' => 'test',
//            'status' => 'complete',
//            'desc' => '',
//            'products' => [
//                ['id' => 96511, 'oname' => 'oid1', 'price' => 88],
//                ['id' => 96511, 'oname' => 'oid1', 'price' => 99],
//            ]
//        ]];
//
//        $sum = 0;
//        foreach ($orders as $item) {
//            foreach ($item['products'] as $itemp) {
//                $sum += $itemp['price'];
//            }
//        }
//
//        dump(collect($orders)->flatMap(function ($order) {
//            return $order['products'];
//        })->sum('price'));


        // dd($sum);
//        $data = collect($orders)->map(function ($order) {
//            // dd($order);
//            return $order['products'];
//        })->flatten(1)->map(function ($item) {
//            return $item['price'];
//        })->sum();

        // dump($data);
//        dump(collect($orders)->flatMap(function ($order) {
//            return $order['products'];
//        })->sum('price'));
    }
}
