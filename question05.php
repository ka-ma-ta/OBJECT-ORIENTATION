<?php  
//Carクラス
class Car {

    public $name;
    public $capacity;
    public $price;
    public $speed;

    //定数
    const ACCELERATION_RATE = 10;
    const DOWN_RATE = 0.05;
    
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
        //乗車人数
        $rideNum = rand(1, $this->capacity);  //1~定員

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
        //乗車人数
        $rideNum = rand(1, $this->capacity);  //1~定員

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

//距離：任意
const DISTANCE = 1000;  //単位：メートル

//アクセルorブレーキの判定
const JUDGE_BRAKE = 1;

//全車ゴールしたかの判定
const JUDGE_GOAL = True;

//配列：車名, 残りの距離, 回数
$arrCar = [
    ["name"=>"Honda", "dis"=>1000, "count"=>0],
    ["name"=>"Nissan", "dis"=>1000, "count"=>0],
    ["name"=>"Ferrari", "dis"=>1000, "count"=>0],
    ["name"=>"Toyota", "dis"=>1000, "count"=>0],
];

//途中経過表示用関数
function Commentary($subname, $subdistance){
    if ($subdistance > 0) {
        echo $subname,"：後",$subdistance,"m\n";
    } else {
        echo $subname,"：ゴール済\n";
    }
}

//インスタンス作成
//Honda
$honda = new Car('honda', 7, rand(251, 350), 20);  //車種名,定員,価格,加速度
$result = $honda->calculation();

//Nissan
$nissan = new Nissan('nissan', 5, rand(100, 250), 20);
$result = $nissan->calculation();

//Ferrari
$ferrari = new Ferrari('ferrari', 2, rand(351, 500), 50);
$ferrari->liftUp();
$result = $ferrari->calculation();

//Toyota
$random = rand(200, 300);
$toyota = new Car('toyota', 5, $random, 1.5 * ($random / 10));  //加速性能=1.5*(価格/10)  比例
$result = $toyota->calculation();

//ループ処理判定用FLG：ゴールしていない車がいる限り
$flg = JUDGE_GOAL;

//スタート
echo "\n----------レース開始----------\n\n";

//回数カウント用
$count = 1;

//ループ：全車がゴールするまで
 //アクセルの確立2/3, ブレーキの確立1/3
 while ($flg == 1):
    //honda
    if (rand(1,3)!=1) { 
        $arrCar[0]["dis"] = $honda->accelerator($arrCar[0]["dis"]);
    } else {
        $arrCar[0]["dis"] = $honda->brake($arrCar[0]["dis"]);
    }
    
    if ($arrCar[0]["dis"] <= 0 && $arrCar[0]["count"] === 0) {
        $arrCar[0]["count"] = $count;
    }

    //nissan
    if (rand(1,3)!=1) {
        $arrCar[1]["dis"] = $nissan->accelerator($arrCar[1]["dis"]);
    } else {
        $arrCar[1]["dis"] = $nissan->brake($arrCar[1]["dis"]);
    }   

    if ($arrCar[1]["dis"] <= 0 && $arrCar[1]["count"] === 0) {
        $arrCar[1]["count"] = $count;
    }

    //ferrari
    if (rand(1,3)!=1) {
        $arrCar[2]["dis"] = $ferrari->accelerator($arrCar[2]["dis"]);
    } else {
        $arrCar[2]["dis"] = $ferrari->brake($arrCar[2]["dis"]);
    }   

    if ($arrCar[2]["dis"] <= 0 && $arrCar[2]["count"] === 0) {
        $arrCar[2]["count"] = $count;
    }

    //toyota
    if (rand(1,3)!=1) {
        $arrCar[3]["dis"] = $toyota->accelerator($arrCar[3]["dis"]);
    } else {
        $arrCar[3]["dis"] = $toyota->brake($arrCar[3]["dis"]);
    } 

    if ($arrCar[3]["dis"] <= 0 && $arrCar[3]["count"] === 0) {
        $arrCar[3]["count"] = $count;
    }

    //途中経過
    echo "\n";
    foreach ($arrCar as $key => $value) {
        Commentary($value["name"], $value["dis"]);
    }
    
    //確認：全車ゴールしたらFLG更新→ループ終了
    if ($arrCar[0]["dis"] <= 0 && $arrCar[1]["dis"] <= 0 && $arrCar[2]["dis"] <= 0 && $arrCar[3]["dis"] <= 0) {
        $flg = 0;
    }

    //回数更新
    $count = $count + 1;

endwhile;

//配列の並び変え
array_multisort(array_column($arrCar, "count"), SORT_ASC, $arrCar);

//終了
echo "\n----------レース終了----------\n\n";

//結果表示
echo "順位\n";
foreach ($arrCar as $key => $value) {
    echo $key+ 1 , "位：", $value["name"], "\n";
}