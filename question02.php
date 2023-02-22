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
    function __construct($name, $capacity, $price, $speed){
        $this->name = $name;
        $this->capacity = $capacity;
        $this->price = $price;
        $this->speed = $speed;
    }    
}

//Ferrariクラス
class Ferrari extends Car{

    public $height = 0;

    //関数：リフトアップ
    public function liftUp(){
        if ($this->height === 0) {
            $this->height = 40;
            $this->speed = $this->speed * 0.8;
            return "リフトアップ";
        } else {
            return "リフトアップ済み";
        }        
    }

    //関数：リフトダウン
    public function liftDown(){
        if ($this->height === 40) {
            $this->height = 0;
            $this->speed = $this->speed / 0.8;
            return "リフトダウン";
        } else {
            return "リフトダウン済み";
        }  
    }    
}

//定数：リフトアップorリフトダウンの判定に用いる
const JUDGE_LIFTUP = 1;

//結果を出力する関数
function output($result, $subHeight, $subSpeed){
    echo $result, "\n";
    echo "--車高：", $subHeight, "mm\n";
    echo "--加速：", $subSpeed, "m/s\n";
    echo "\n";
}

//インスタンス作成 : name, capacity, price, speed
$ferrari = new Ferrari('ferrari', 2, 300, 50);

output("リフトアップ/リフトダウン前", $ferrari->height, $ferrari->speed);

//5回繰り返す
for ($i = 0; $i < 5; $i++) { 

    echo $i + 1,"回目\n";
    
    if (rand(1,2) === JUDGE_LIFTUP) {
        $result = $ferrari->liftUp();
        output($result, $ferrari->height, $ferrari->speed);
    } else {
        $result = $ferrari->liftDown();
        output($result, $ferrari->height, $ferrari->speed);
    }
    
}