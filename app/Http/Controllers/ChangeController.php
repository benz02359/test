<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ChangeController extends Controller
{
    public function index(){
        return view('Change.index');
    }

    public function change(Request $request){
        $money = $request->input('money');
        $price =$request->input('price');
        $error = $money - $price;
        if($error <0 ){

            return redirect()->back()->with('alert','จำนวนเงินไม่ถูกต้อง');

        }else{

        $request->validate([
            'money'=>'required|numeric',
            'price'=>'required|numeric',

            ],
            [
                'money.required'=>"Please enter Numbers",
                'money.max'=>"Max number of Letter is 10 ",
                'money.numeric'=>"only numbers",
                'price.required'=>"Please enter Numbers",
                'price.max'=>"Max number of Letter is 10 ",
                'price.numeric'=>"only numbers",
            ]
        );
        $money = $request->input('money');
        $price =$request->input('price');
        $total = $money - $price;
        $return = $total;
        $change = array(
            '0'=>[500,0,"ใบ"],
            '1'=>[100,0,"ใบ"],
            '2'=>[50,0,"เหรียญ"],
            '3'=>[10,0,"เหรียญ"],
            '4'=>[5,0,"เหรียญ"],
            '5'=>[1,0,"เหรียญ"]);

        $i = 0;
        for($i = 0; $return != 0; $i++){
        $total = $return;
        $change[$i][1] = intval($total/$change[$i][0]);
        $return = $total- ($change[$i][1]*$change[$i][0]);


        if($return == 0){
            break;
        }
        }
        //dd($change);
        return view('change.cal')->with('change',$change);
    }

    }
}
