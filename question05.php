<?php  
//
//Carクラス
class Car {
    //
    //プロパティ
    protected $name;
    protected $capacity;
    protected $price;
    protected $speed;
    //
    //アクセル
    function Accelerator(){
        //
    }
    //
    //ブレーキ
    function Brake(){
        //
        //1回につき+10秒
        return 10;
        //
    }
    //
    //表示：基本情報
    function __construct($name, $capacity, $price, $speed){
        //改行する、シングルクォーテーションorダブルクォーテーションに注意
        echo "車種名：", $name, "\n";
        echo "--定員：", $capacity, "人\n";
        echo "--価格：", $price, "万円\n";
        echo "--加速：", $speed, "m/s\n";
        echo "\n";
        echo "--アクセル：あり\n";
        echo "--ブレーキ：あり\n";
        //echo "\n";
        echo "\n";
        //
    }
    //
    //計算：乗車人数→低下率→加速性能
    function Ride($capacity, $speed){
        //
        //乗車人数
        $ridenum = rand(1, $capacity);  //1~定員
        //
        //低下率
        $rate = $ridenum*0.05;
        //
        //加速性能
        $acc_perfomance = $speed*(1-$rate);
        //
        //返す
        return array($ridenum,$rate,$acc_perfomance);
        //
    }   
    //
}
//
//距離：任意
$distance = 5000;  //単位：メートル
//
//インスタンス作成用

//
?>