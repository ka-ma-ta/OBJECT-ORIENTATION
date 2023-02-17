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
        //距離-加速度*10秒
        return $RemaingDistance-$speed*10;
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
//配列：車名 => 残りの距離
$arrCar = [
    ["Honda",5000],
    ["Nissan",5000],
    ["Ferrari",5000],
    ["Toyota",0],
];
//
//配列：順位
$arrRank = [];
//
//インスタンス作成用
//Honda
$Honda = new Car('honda', 7, rand(251, 350), 20);  //車種名,定員,価格,加速度
$return = $Honda->Ride(7, 20);  //乗車人数,低下率,加速性能
$Honda->Result('honda',$return[2]);
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
//
//
//Ferrari
$Ferrari = new Car('ferrari', 2, 300, 50);
$return = $Ferrari->Ride(2, 50);
$Ferrari->Result('ferrari',$return[2]);
//
/* 
//Toyota
class Toyota extends Car{
    //
    //価格を元に、加速度を求める
    return 
    //
}
$Toyota = new Car('toyota', 5, 300, 50);
$return = $Ferrari->Ride(2, 50);
$Ferrari->Result($return[0],$return[1],$return[2]);
//
*/
//ループ処理判定用のFLG：ゴールしていない車がいる限り1
$FLG = 1;
//
//スタート
echo "\n----------レース開始----------\n\n";
//
//ループ
while($FLG === 1):
    //
    for($i=0; $i<4; $i++){
        //
        //honda
        if (rand(1,2)===1) {
            
        } else {
            # code...
        }
        
        //
        //nissan

        //
        //ferrari

        //
        //toyota

        //
        if($arrCar[$i][1]>0){
            //
            if (rand(1, 2)===1) {
                
            }else {
                
            }
            //
            echo $arrCar[$i][0],"：後xxxm\n";
        }else{
            echo $arrCar[$i][0],"：ゴール済み\n";
        }
    }
    //
    //確認→FLG更新
    //if (condition) {
        $FLG = 0;
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