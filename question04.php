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

    //計算：乗車人数→低下率→加速性能
    public function calculation(){
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
$honda = new Car('honda', 7, rand(251, 350), 20);  //車種名,定員,価格,加速度
$result = $honda->calculation();
output($honda->name, $result[0], $result[1], $honda->speed);

//Nissan
class Nissan extends Car{
    public function calculation(){
        //乗車人数
        $rideNum = rand(1, $this->capacity);  //1~定員

        //低下率
        $rate = $rideNum * 0.05;

        //Maxが性能の60% → 低下率は最低でも40%
        if ($rate < 0.4) {
            $rate = 0.4;
        }

        //加速性能
        $this->speed = $this->speed * (1-$rate);

        //返す
        return [$rideNum, $rate * 100];
    } 
}
$nissan = new Nissan('nissan', 5, rand(100, 250), 20);
$result = $nissan->calculation();
output($nissan->name, $result[0], $result[1], $nissan->speed);

//Ferrari
class Ferrari extends Car{

    public $height = 0;

    //関数：リフトアップ
    public function liftUp(){
        if ($this->height === 0) {
            $this->height = 40;
            $this->speed = $this->speed*0.8;
            return "リフトアップ";
        } else {
            return "リフトアップ済み";
        }        
    }

    //関数：リフトダウン
    public function liftDown(){
        if ($this->height === 40) {
            $this->height = 0;
            $this->speed = $this->speed/0.8;
            return "リフトダウン";
        } else {
            return "リフトダウン済み";
        }  
    }
}
$ferrari = new Ferrari('ferrari', 2, rand(351, 500), 50);
$ferrari->liftUp();
$result = $ferrari->calculation();
output($ferrari->name, $result[0], $result[1], $ferrari->speed);