<?php  
//デバッグ環境構築する！！！

//Carクラス
class Car {

    protected $name;
    protected $capacity;
    protected $price;
    protected $speed;

    //アクセル
    function accelerator(){
        //
    }

    //ブレーキ
    function brake(){
        //
    }

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
        echo "\n";
        echo "\n";
    }

}
//
//問題文を満たすように、任意の数字を渡す
//
//Honda
$Honda = new Car('honda', 7, 150, 20,);
//
//Nissan
$Nissan = new Car('nissan', 5, 100, 20);
//
//Ferrari
$Ferrari = new Car('ferrari', 2, 300, 50);
//
//ok
?>