<?php  
//Carクラス
class Car {
    
    public $name;
    public $capacity;
    public $price;
    public $speed;

    //定数
    //低下率
    const DOWN_RATE = 0.05;
    
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
        $rate = $rideNum * self::DOWN_RATE;

        //加速性能
        $this->speed = $this->speed * (1 - $rate);

        //返す
        return [$rideNum, $rate];
    } 
}

//Nissanクラス
class Nissan extends Car{
    public function calculation(){
        //乗車人数
        $rideNum = rand(1, $this->capacity);  //1~定員

        //低下率
        $rate = $rideNum * self::DOWN_RATE;

        //Maxが性能の60% → 低下率は最低でも40%
        if ($rate < 0.4) {
            $rate = 0.4;
        }

        //加速性能
        $this->speed *= (1 - $rate);

        //返す
        return [$rideNum, $rate];
    } 
}

//Ferrariクラス
class Ferrari extends Car{

    public $height = 0;

    //定数
    const HEIGHT_UP = 40;
    const HEIGHT_DOWN = 0;
    const SPEED_RATE = 0.8;

    //関数：リフトアップ
    public function liftUp(){
        if ($this->height === self::HEIGHT_DOWN) {
            $this->height = self::HEIGHT_UP;
            $this->speed *= self::SPEED_RATE;
            return "リフトアップ";
        } else {
            return "リフトアップ済み";
        }        
    }

    //関数：リフトダウン
    public function liftDown(){
        if ($this->height === self::HEIGHT_UP) {
            $this->height = self::HEIGHT_DOWN;
            $this->speed /= self::SPEED_RATE;
            return "リフトダウン";
        } else {
            return "リフトダウン済み";
        }  
    }    
}

//表示：結果
function output($reName, $relNum, $reRate, $reSpeed){
echo $reName, "\n";
echo "--乗車人数：", $relNum, "人\n";
echo "--低下率：", $reRate * 100, "%\n";
echo "--加速性能：", $reSpeed, "m/s\n";
echo "\n\n";
}

//問題文を満たすように、任意の値を使用
$arrCar = [
    [
        "name" => "honda",
        "capacity" => 7,
        "price" => rand(251, 350),  
        "speed" => 20,
    ],
    [
        "name" => "nissan",
        "capacity" => 5,
        "price" => rand(100, 250),
        "speed" => 20,
    ],
    [
        "name" => "ferrari",
        "capacity" => 2,
        "price" => rand(351, 500),
        "speed" => 50,
    ],
];

//ループ：$arrCarの数
foreach ($arrCar as $key => $value) {
    //インスタンス作成
    switch($value["name"]){
        case 'nissan':
            $car = new Nissan($value["name"], $value["capacity"], $value["price"], $value["speed"]);
            break;

        case 'ferrari':
            $car = new Ferrari($value["name"], $value["capacity"], $value["price"], $value["speed"]);
            $car->liftUp();  //ここではリフトアップすると想定
            break;

        default;
            $car = new Car($value["name"], $value["capacity"], $value["price"], $value["speed"]);
    }

    //計算
    $result = $car->calculation();

    //出力
    output($car->name, $result[0], $result[1], $car->speed);

    //test
    //var_dump($car);
}