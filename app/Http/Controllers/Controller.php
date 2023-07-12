<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Models\test;


class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function DisplayTable(){
        $result = test::all();

        foreach($result as $data){
            if($data->index == 'A5'){
                $A5 = $data->value ;
            }
            if($data->index == 'A20') {
                $A20 = $data->value ;
            }

            if($data->index == 'A15'){
                $A15 = $data->value;
            }

            if($data->index == 'A7'){
                $A7 = $data->value;
            }

            if($data->index == 'A13'){
                $A13 = $data->value;
            }

            if($data->index == 'A12'){
                $A12 = $data->value;
            }
            
        }
        $alpha = $A5 + $A20;
        $beta = $A15 / $A7;
        $charlie = $A13 * $A12;

        $calculation = [];
        $calculation = [

            (object) [
                'category' => 'Alpha',
                'calculation' => 'A5 + A20',
                'total' => $alpha,
            ],
            (object) [
                'category' => 'Beta',
                'calculation' => 'A15 / A7',
                'total' => $beta,
            ],
            (object) [
                'category' => 'Charlie',
                'calculation' => 'A13 * A12',
                'total' => $charlie,
            ]

        ];
                
        return view ('welcome' , compact('result' , 'calculation'));
    }
}
