<?php  
//Carクラス
class Car {

    public $name;
    public $capacity;
    public $price;
    public $speed;
    
    //アクセル
    function accelerator($subDistance){
        if ($subDistance>0) {
            //距離-加速度*10秒
            return $subDistance-$this->speed*10;
        } else {
            //返す
            return $subDistance;
        }        
    }

    //ブレーキ
    function brake($subDistance){
        //何もしない
        return $subDistance;
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

//距離：任意
$distance = 1000;  //単位：メートル

//配列：車名,残りの距離
$arrCar = [
    ["Honda",1000],
    ["Nissan",1000],
    ["Ferrari",1000],
    ["Toyota",1000],
];

//配列：順位
$arrRank = [];

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
$nissan = new Nissan('nissan', 5, rand(100, 250), 20);
$result = $nissan->calculation();

//Ferrari
$ferrari = new Car('ferrari', 2, rand(351, 500), 50);
$result = $ferrari->calculation();

//Toyota
class Toyota extends Car{
    //
    //価格を元に、加速度を求める
    
    //
}
$toyota = new Toyota('toyota', 5, rand(100, 250), 20);
$result = $toyota->calculation();

//ループ処理判定用FLG：ゴールしていない車がいる限り1
$flg = 1;

//スタート
echo "\n----------レース開始----------\n\n";

//ループ：全車がゴールするまで
while($flg == 1):
    //honda
    if (rand(1,3)!=1) {
        $arrCar[0][1] = $honda->accelerator($arrCar[0][1]);
    } else {
        $arrCar[0][1] = $honda->brake($arrCar[0][1]);
    }    

    //nissan
    if (rand(1,3)!=1) {
        $arrCar[1][1] = $nissan->accelerator($arrCar[1][1]);
    } else {
        $arrCar[1][1] = $nissan->brake($arrCar[1][1]);
    }   

    //ferrari
    if (rand(1,3)!=1) {
        $arrCar[2][1] = $ferrari->accelerator($arrCar[2][1]);
    } else {
        $arrCar[2][1] = $ferrari->brake($arrCar[2][1]);
    }   

    //toyota
    if (rand(1,3)!=1) {
        $arrCar[3][1] = $toyota->accelerator($arrCar[3][1]);
    } else {
        $arrCar[3][1] = $toyota->brake($arrCar[3][1]);
    } 

    //途中経過
    echo "\n";
    Commentary("Honda",$arrCar[0][1]);
    Commentary("Nissan",$arrCar[1][1]);
    Commentary("Ferrari",$arrCar[2][1]);
    Commentary("Toyota",$arrCar[3][1]);
    //
    //確認→FLG更新
    if ($arrCar[0][1] <= 0 && $arrCar[1][1] <= 0 && $arrCar[2][1] <= 0 && $arrCar[3][1] <= 0) {
        $flg = 0;
    }

endwhile;

//結果表示
echo "\n";
echo "1位：\n";
echo "2位：\n";
echo "3位：\n";
echo "4位：\n";

//終了
echo "\n----------レース終了----------\n\n";