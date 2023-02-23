<?php
//Carクラス
class Car {

    public $name;
    public $capacity;
    public $price;
    public $speed;
    
    //アクセル
    public function accelerator(){
        //ここでは無し
    }
    
    //ブレーキ
    public function brake(){
        //ここでは無し
    }

    //初期値をセット
    public function __construct($name, $capacity, $price, $speed){
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

//問題文を満たすように、任意の値を使用
$arrCar = [
    [
        "name" => "honda",
        "capacity" => 7,
        "price" => 150,
        "speed" => 20,
    ],
    [
        "name" => "nissan",
        "capacity" => 5,
        "price" => 100,
        "speed" => 20,
    ],
    [
        "name" => "ferrari",
        "capacity" => 2,
        "price" => 300,
        "speed" => 50,
    ],
];

//ループ：$arrCarの数
foreach ($arrCar as $key => $value) {
    $car = new Car($value["name"], $value["capacity"], $value["price"], $value["speed"]);
    output($car->name, $car->capacity, $car->price, $car->speed);
}