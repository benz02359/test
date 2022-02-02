<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CalculatorController extends Controller
{
    public function index(){
        return view('Calculator.index');
    }

    public function cal(Request $request){
        $mymoney = $request->input('mymoney');
        $shop1 = intval($mymoney/25);
        $totalprice1= intval($shop1*25);
        $change1 = intval($mymoney-$totalprice1);
        if($shop1>=10){
            $shop1 = intval($mymoney/20);
            $totalprice1=intval($shop1*20);
            $change1 = intval($mymoney-$totalprice1);
        }

        $shop2 = intval($mymoney/30);
        $totalprice2 =intval($shop2*30);
        $change2 = intval($mymoney-$totalprice2);
        $free =intval($shop2/3);
        $shop2 = intval($shop2+$free);


        if($shop1 > $shop2){
            $arr = array("จำนวนเงิน $mymoney บาท ซื้อร้านที่1 ได้ $shop1 ชิ้น เหลือเงิน $change1 บาท\n
            ซื้อร้านที่2 ได้ $shop2 ชิ้น เหลือเงิน $change2 บาท \n
            แนะนำให้ซื้อร้านที่ 1 จะคุ้มที่สุด");
        }
        else {
            $arr = array("จำนวนเงิน $mymoney บาท ซื้อร้านที่1 ได้ $shop1 ชิ้น เหลือเงิน $change1 บาท<br>
            ซื้อร้านที่2 ได้ $shop2 ชิ้น เหลือเงิน $change2 บาท <br>
            แนะนำให้ซื้อร้านที่ 2 จะคุ้มที่สุด");
        }

        return view('Calculator.calculator')->with('arr',$arr);
    }
}
