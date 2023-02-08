<?php  
//
//Carクラス
class Car {
    //
    private $name;
    private $capacity;
    private $price;
    private $speed;
    //
    //アクセル
    function accelerator(){
        //
    }
    //
    //ブレーキ
    function brake(){
        //
    }
    //
    //結果を出力する関数
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
    function Calculation($num, $speed){
        //
        //計算
        $low = $num*0.05;
        $speed = $speed*(1-$low);
        //
        //配列で返す(合計金額, 台数)
        return array($total, $num);
        //
    }
    //
}
//

//
?>