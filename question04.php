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

    //計算：乗車人数→低下率→加速性能
    function calculation(){
        //乗車人数
        $rideNum = rand(1, $this->capacity);  //1~定員

        //低下率
        $rate = $rideNum * 0.05;

        //加速性能
        $this->speed = $this->speed * (1-$rate);

        //返す
        return [$rideNum, $rate * 100];
    } 
}

//表示：結果
function output($reName, $relNum, $reRate, $reSpeed){
echo $reName, "\n";
echo "--乗車人数：", $relNum, "人\n";
echo "--低下率：", $reRate, "%\n";
echo "--加速性能：", $reSpeed, "m/s\n";
echo "\n\n";
}

//インスタンス作成用
//Honda
$Honda = new Car('honda', 7, rand(251, 350), 20);  //車種名,定員,価格,加速度
$result = $Honda->calculation();
output($Honda->name, $result[0], $result[1], $Honda->speed);

//Nissan
class Nissan extends Car{
    function calculation(){
        //乗車人数
        $rideNum = rand(1, $this->capacity);  //1~定員

        //低下率
        $rate = $rideNum * 0.05;

        //Maxが性能の60%
        if ($rate < 0.4) {
            $rate = 0.4;
        }

        //加速性能
        $this->speed = $this->speed * (1-$rate);

        //返す
        return [$rideNum, $rate * 100];
    } 
}
$Nissan = new Nissan('nissan', 5, rand(100, 250), 20);
$result = $Nissan->calculation();
output($Nissan->name, $result[0], $result[1], $Nissan->speed);

//Ferrari
$Ferrari = new Car('ferrari', 2, rand(351, 500), 50);
$result = $Ferrari->calculation();
output($Ferrari->name, $result[0], $result[1], $Ferrari->speed);