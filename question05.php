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
    function Accelerator($RemaingDistance, $speed){
        //
        if ($RemaingDistance>0) {
            //距離-加速度*10秒
            return $RemaingDistance-$speed*10;
        } else {
            //返す
            return $RemaingDistance;
        }        
        //
    }
    //
    //ブレーキ
    function Brake($RemaingDistance){
        //
        //何もしない
        return $RemaingDistance;
        //
    }
    //
    //表示：基本情報
    function BasicInfo($name, $capacity, $price, $speed){
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
    //表示：結果
    function Result($name, $acceleration){
        //function Result($acceleration){
            //
            echo "基本情報：",$name,"\n";
            //echo "--乗車人数：", $totalNum, "人\n";
            //echo "--低下率：", $lowrate, "%\n";
            echo "--加速性能：", $acceleration, "m/s\n";
            echo "\n";
            //
        }
    //
}
//
//距離：任意
$distance = 1000;  //単位：メートル
//
//配列：車名,残りの距離,加速性能
$arrCar = [
    ["Honda",1000,0],
    ["Nissan",1000,0],
    ["Ferrari",1000,0],
    ["Toyota",1000,0],
];
//
//配列：順位
$arrRank = [];
//
//途中経過表示用関数
function Commentary($subname, $subdistance){
    if ($subdistance>0) {
        echo $subname,"：後",$subdistance,"m\n";
    } else {
        echo $subname,"：ゴール済\n";

    }
}
//
//インスタンス作成用
//Honda
$Honda = new Car('honda', 7, rand(251, 350), 20);  //車種名,定員,価格,加速度
$return = $Honda->Ride(7, 20);  //乗車人数,低下率,加速性能
$Honda->Result('honda',$return[2]);
$arrCar[0][2] = $return[2];
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
$Nissan->Result('nissan',$return_sub);
$arrCar[1][2] = $return_sub;
//
//
//Ferrari
$Ferrari = new Car('ferrari', 2, 300, 50);
$return = $Ferrari->Ride(2, 50);
$Ferrari->Result('ferrari',$return[2]);
$arrCar[2][2] = $return[2];
//
//Toyota
class Toyota extends Car{
    //
    //価格を元に、加速度を求める
    
    //
}
$Toyota = new Toyota('toyota', 5, 300, 50);
$return = $Toyota->Ride(2, 50);
$Toyota->Result('toyota',$return[2]);
$arrCar[2][2] = $return[2];
//
//ループ処理判定用のFLG：ゴールしていない車がいる限り1
$FLG = 1;
//
//スタート
echo "\n----------レース開始----------\n\n";
//
//ループ
while($FLG == 1):
//for ($i=0; $i < 10 ; $i++) { 
    # code...
    //
    //honda
    if (rand(1,3)!=1) {
        $arrCar[0][1] = $Honda->Accelerator($arrCar[0][1],$arrCar[0][2]);
    } else {
        $arrCar[0][1] = $Honda->Brake($arrCar[0][1]);
    }    
    //
    //nissan
    if (rand(1,3)!=1) {
        $arrCar[1][1] = $Nissan->Accelerator($arrCar[1][1],$arrCar[1][2]);
    } else {
        $arrCar[1][1] = $Nissan->Brake($arrCar[1][1]);
    }   
    //
    //ferrari
    if (rand(1,3)!=1) {
        $arrCar[2][1] = $Ferrari->Accelerator($arrCar[2][1],$arrCar[2][2]);
    } else {
        $arrCar[2][1] = $Ferrari->Brake($arrCar[2][1]);
    }   
    //
    //toyota

    //
    //途中経過
    echo "\n";
    Commentary("Honda",$arrCar[0][1]);
    Commentary("Nissan",$arrCar[1][1]);
    Commentary("Ferrari",$arrCar[2][1]);
    Commentary("Toyota",$arrCar[3][1]);
    //
    //確認→FLG更新
    if ($arrCar[0][1]<=0 && $arrCar[1][1]<=0 &&$arrCar[2][1]<=0) {
        $FLG = 0;
    }
    //
    //$FLG = 0;
//}
    //
endwhile;
//
//結果表示
echo "\n";
echo "1位：\n";
echo "2位：\n";
echo "3位：\n";
echo "4位：\n";
//
//終了
echo "\n----------レース終了----------\n\n";
//
?>