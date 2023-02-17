<?php  
//
//Carクラス
class Car {
    //
    //プロパティ
    protected $name;
    protected $capacity;
    protected $price;
    protected $speed;
    //
    //アクセル
    function Accelerator(){
        //
    }
    //
    //ブレーキ
    function Brake(){
        //
    }
    //
    //表示：基本情報
    function __construct($name, $capacity, $price, $speed){
        //改行する、シングルクォーテーションorダブルクォーテーションに注意
        echo "車種名：", $name, "\n";
        echo "--定員：", $capacity, "人\n";
        echo "--価格：", $price, "万円\n";
        echo "--加速：", $speed, "m/s\n";
        echo "\n";
        echo "--アクセル：あり\n";
        echo "--ブレーキ：あり\n";
        //echo "\n";
        echo "\n";
        //
    }
    //
    //計算：乗車人数→低下率→加速性能
    function Ride($capacity, $speed){
        //
        //乗車人数
        $ridenum = rand(1, $capacity);  //1~定員
        //
        //低下率
        $rate = $ridenum*0.05;
        //
        //加速性能
        $acc_perfomance = $speed*(1-$rate);
        //
        //返す
        return array($ridenum,$rate,$acc_perfomance);
        //
    }   
    //
    //
    //表示：結果
    function Result($totalNum, $lowrate, $acceleration){
    //function Result($acceleration){
        //
        echo "※計算結果※\n";
        echo "--乗車人数：", $totalNum, "人\n";
        echo "--低下率：", $lowrate, "%\n";
        echo "--加速性能：", $acceleration, "m/s\n";
        echo "\n\n\n";
        //
    }
    //
}
//
//インスタンス作成用
//Honda
$Honda = new Car('honda', 7, rand(251, 350), 20);  //車種名,定員,価格,加速度
$return = $Honda->Ride(7, 20);
$Honda->Result($return[0],$return[1],$return[2]);
//
//Nissan
class Nissan extends Car{
    //
    //計算：性能の60%
    function Defect($speed, $lowrate){
        //
        //返す：60%以上かそれ以外か
        if($speed*0.6 < $lowrate){
            return $speed*0.6;
        }else{
            $lowrate;
        }
        //
    }
    //
}
$Nissan = new Nissan('nissan', 5, rand(100, 250), 20);
$return = $Nissan->Ride(5, 20);
$return_sub = $Nissan->Defect(20, $return[2]);
$Nissan->Result($return[0],$return[1],$return_sub);
//
//
//Ferrari
$Ferrari = new Car('ferrari', 2, 300, 50);
$return = $Ferrari->Ride(2, 50);
$Ferrari->Result($return[0],$return[1],$return[2]);
//
?>