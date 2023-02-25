<?php  
//Carクラス
class Car {

    public $name;
    public $capacity;
    public $price;
    public $speed;

    //定数
    //アクセル踏む時間（単位：秒）
    const ACCELERATION_RATE = 10;
    //加速度低下率
    const DOWN_RATE = 0.05;  //%
    
    //アクセル
    public function accelerator($subDistance){
        if ($subDistance > 0) {
            //距離-加速度*10秒
            return $subDistance - $this->speed * self::ACCELERATION_RATE;
        } else {
            //返す
            return $subDistance;
        }        
    }

    //ブレーキ
    public function brake($subDistance){
        //何もしない
        return $subDistance;
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
        //乗車人数（1~定員）
        $rideNum = rand(1, $this->capacity);

        //低下率
        $rate = $rideNum * self::DOWN_RATE;

        //加速性能
        $this->speed *= (1 - $rate);

        //返す
        return [$rideNum, $rate];
    } 
}

//Nissanクラス
class Nissan extends Car{
    public function calculation(){
        //乗車人数（1~定員）
        $rideNum = rand(1, $this->capacity);

        //低下率
        $rate = $rideNum * self::DOWN_RATE;

        //Maxが性能の60%
        if ($rate < 0.4) {
            $rate = 0.4;
        }

        //加速性能
        $this->speed = $this->speed * (1 - $rate);

        //返す
        return [$rideNum, $rate];
    } 
}

//Ferrariクラス
class Ferrari extends Car{

    public $height = 0;

    //定数
    const HEIGHT_UP = 40;  //mm
    const HEIGHT_DOWN = 0;  //mm
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

//Toyotaクラス
class Toyota extends Car{
    public function calculationSpeed(){
        //加速性能=1.5*(価格/10)
        $this->speed = 1.5 * ($this->price / 10);
    } 
}

//距離：任意（単位：メートル）
const DISTANCE = 1000;

//アクセルorブレーキの判定
const JUDGE_BRAKE = 1;

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
    [
        "name" => "toyota",
        "capacity" => 5,
        "price" => rand(200, 300),
        "speed" => 0,  //価格に比例
    ],
];

//配列：車名, ゴールにかかった回数
$arrInstance = [];

//レース：$arrCar
foreach ($arrCar as $key => $value) {
    //残りの距離
    $distance = DISTANCE;

    //インスタンス作成
    switch($value["name"]){
        case 'nissan':
            $car = new Nissan($value["name"], $value["capacity"], $value["price"], $value["speed"]);
            break;

        case 'ferrari':
            $car = new Ferrari($value["name"], $value["capacity"], $value["price"], $value["speed"]);
            //ここではリフトアップすると想定
            $car->liftUp();  
            break;

        case 'toyota':
            $car = new Toyota($value["name"], $value["capacity"], $value["price"], $value["speed"]);
            $car->calculationSpeed();
            break;

        default;
            $car = new Car($value["name"], $value["capacity"], $value["price"], $value["speed"]);
    }

    //加速度計算
    $result = $car->calculation();

    //順位計算用
    $count = 0;

    //レース
    while ($distance > 0) {
        //アクセルorブレーキ
        if (rand(1,3) != JUDGE_BRAKE) { 
            $distance = $car->accelerator($distance);
        } else {
            $distance = $car->brake($distance);
        }

        //カウントアップ
        $count += 1;
    }

    //配列に入れておく(車名, ゴールまででにかかった回数)
    $arrInstance[] = ["name"=>$car->name, "count"=>$count];
    
}

//配列の並び変え：countの昇順
$sortKey = array_column($arrInstance, 'count');
array_multisort($sortKey, SORT_ASC, $arrInstance);

//結果表示
foreach ($arrInstance as $key => $value) {
    echo $key+ 1 , "位：", $value["name"], "\n";
}