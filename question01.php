<?php
//Carクラス
class Car {

    public $name;
    public $capacity;
    public $price;
    public $speed;
    
    //アクセル
    function accelerator(){
        //ここでは無し
    }
    
    //ブレーキ
    function brake(){
        //ここでは無し
    }

    //初期値をセット
    function __construct($name, $capacity, $price, $speed){
        $this->name = $name;
        $this->capacity = $capacity;
        $this->price = $price;
        $this->speed = $speed;
    }
}

//結果を出力する関数
function output($name, $capacity, $price, $speed){
    //改行する、シングルクォーテーションorダブルクォーテーションに注意
    echo "車種名：", $name, "\n";
    echo "--定員：", $capacity, "人\n";
    echo "--価格：", $price, "万円\n";
    echo "--加速：", $speed, "m/s\n";
    echo "--アクセル：あり\n";
    echo "--ブレーキ：あり\n";
    echo "\n";
    echo "\n";
}

//問題文を満たすように、任意の数字を渡す
//Honda
$honda = new Car('honda', 7, 150, 20,);
output($honda->name, $honda->capacity, $honda->price, $honda->speed);

//Nissan
$nissan = new Car('nissan', 5, 100, 20);
output($nissan->name, $nissan->capacity, $nissan->price, $nissan->speed);

//Ferrari
$ferrari = new Car('ferrari', 2, 300, 50);
output($ferrari->name, $ferrari->capacity, $ferrari->price, $ferrari->speed);