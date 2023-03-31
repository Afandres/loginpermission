<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller{

    public function index(){
        $data=['title'=>'Calculadora'];
        return view('calculator.index',$data);
    }

    public function resultado(Request $request){
        $n1 = $request ->input('num1');
        $n2 = $request ->input('num2');
        $op = $request ->input('op');
        if ($op=='add'){
            $res= $n1 + $n2;
        }elseif($op=='subtraction'){
            $res= $n1 - $n2;
        }
       
        $data=['title'=>'Calculadora','resultado'=>$res];
        return view('calculator.resultado',$data);
    }
}
