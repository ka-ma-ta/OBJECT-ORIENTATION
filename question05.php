<?php  
//Carクラス
class Car {

    public $name;
    public $capacity;
    public $price;
    public $speed;
    
    //アクセル
    public function accelerator($subDistance){
        if ($subDistance>0) {
            //距離-加速度*10秒
            return $subDistance-$this->speed*10;
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
        $rate = $rideNum * 0.05;

        //加速性能
        $this->speed = $this->speed * (1-$rate);

        //返す
        return [$rideNum, $rate * 100];
    } 
}

//距離：任意
$distance = 1000;  //単位：メートル

//配列：車名, 残りの距離, 回数
$arrCar = [
    ["name"=>"Honda", "dis"=>1000, "count"=>0],
    ["name"=>"Nissan", "dis"=>1000, "count"=>0],
    ["name"=>"Ferrari", "dis"=>1000, "count"=>0],
    ["name"=>"Toyota", "dis"=>1000, "count"=>0],
];

//途中経過表示用関数
function Commentary($subname, $subdistance){
    if ($subdistance>0) {
        echo $subname,"：後",$subdistance,"m\n";
    } else {
        echo $subname,"：ゴール済\n";
    }
}

//インスタンス作成用
//Honda
$honda = new Car('honda', 7, rand(251, 350), 20);  //車種名,定員,価格,加速度
$result = $honda->calculation();

//Nissan
class Nissan extends Car{
    public function calculation(){
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
$nissan = new Nissan('nissan', 5, rand(100, 250), 20);
$result = $nissan->calculation();

//Ferrari
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
$ferrari = new Ferrari('ferrari', 2, rand(351, 500), 50);
$ferrari->liftUp();
$result = $ferrari->calculation();

//Toyota
$random = rand(200, 300);
$toyota = new Car('toyota', 5, $random, 1.5 * ($random / 10));  //加速性能=1.5*(価格/10)  比例
$result = $toyota->calculation();

//ループ処理判定用FLG：ゴールしていない車がいる限り1
$flg = 1;

//スタート
echo "\n----------レース開始----------\n\n";

//回数
$count = 1;

//ループ：全車がゴールするまで
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
    Commentary("Honda", $arrCar[0]["dis"]);
    Commentary("Nissan", $arrCar[1]["dis"]);
    Commentary("Ferrari", $arrCar[2]["dis"]);
    Commentary("Toyota", $arrCar[3]["dis"]);
    
    //確認：全車ゴールしたらFLG更新
    if ($arrCar[0]["dis"] <= 0 && $arrCar[1]["dis"] <= 0 && $arrCar[2]["dis"] <= 0 && $arrCar[3]["dis"] <= 0) {
        $flg = 0;
    }

    //回数更新
    $count = $count + 1;

endwhile;

//配列の並び変え
array_multisort(array_column($arrCar, "count"), SORT_ASC, $arrCar);


//結果表示
echo "\n\n順位\n";
echo "1位：", $arrCar[0]["name"], "\n";
echo "2位：", $arrCar[1]["name"], "\n";
echo "3位：", $arrCar[2]["name"], "\n";
echo "4位：", $arrCar[3]["name"], "\n";

//終了
echo "\n----------レース終了----------\n\n";