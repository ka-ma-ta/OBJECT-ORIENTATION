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

//Ferrariクラス
class Ferrari extends Car{

    public $height = 0;

    //関数：リフトアップ
    function liftUp(){
        if ($this->height === 0) {
            $this->height = 40;
            $this->speed = $this->speed*0.8;
            return "リフトアップ";
        } else {
            return "リフトアップ済み";
        }        
    }

    //関数：リフトダウン
    function liftDown(){
        if ($this->height === 40) {
            $this->height = 0;
            $this->speed = $this->speed/0.8;
            return "リフトダウン";
        } else {
            return "リフトダウン済み";
        }  
    }
}

//結果を出力する関数
function output($result, $subHeight, $subSpeed){
    echo $result, "\n";
    echo "--車高：", $subHeight, "mm\n";
    echo "--加速：", $subSpeed, "m/s\n";
    echo "\n";
}

//実行
$ferrari = new Ferrari('ferrari', 2, 300, 50);

output("リフトアップ/リフトダウン前", $ferrari->height, $ferrari->speed);

//5回繰り返す
for ($i=0; $i < 5; $i++) { 

    echo $i + 1,"回目\n";
    
    //1：リフトアップ　2：リフトダウン
    if (rand(1,2) === 1) {
        $result = $ferrari->liftUp();
        output($result, $ferrari->height, $ferrari->speed);
    } else {
        $result = $ferrari->liftDown();
        output($result, $ferrari->height, $ferrari->speed);
    }
    
}