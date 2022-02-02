<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){

        //1
        /*$i=1;
        $sum = 0;
        for($i=1;$i<=100;$i++)
            if($i %7 ==0 && $i <=100){
                    $sum += $i;
                    echo "i = $i sum = $sum ลงตัว<br> ";
                }
            else {

                echo "i = $i sum = $sum ไม่ลงตัว<br>";
        }
        echo "i = $i sum = $sum";

        return view('welcome',compact('i','sum'));*/

        //2

        $money = array([
            '500','100','50','10','5','1',
        ]);
        

        return view('welcome',compact('money'));

        }

    }
