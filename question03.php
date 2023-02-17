<?php  
//
//Carクラス
class Car {
    //
    protected $name;
    protected $capacity;
    protected $price;
    protected $speed;
    //
    //アクセル
    function accelerator(){
        //
    }
    //
    //ブレーキ
    function brake(){
        //
    }
    //
    //結果を出力する関数
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
    function Calculation($num, $amount){
        //
        //計算
        $total = $num*$amount;
        //
        //配列で返す(合計金額, 台数)
        return array($total, $num);
        //
    }
    //
}
//
$CarModel = [
    ['honda', 7, rand(251, 350), 20],  //Honda　普通
    ['nissan', 7, rand(100, 250), 20],  //Nissan　安い
    ['ferrari', 2, rand(351, 500), 50]  //Ferrari　高い
];
//
$arrNum = [];
$arrTotal = [];
//
//ループ：車の種類数繰り返す
for($i=0; $i<count($CarModel); $i++){
    //インスタンス作成、基本情報表示
    $SubCar = new Car($CarModel[$i][0], $CarModel[$i][1], $CarModel[$i][2], $CarModel[$i][3]);
    //
    //計算、生産台数、金額を表示
    $result = $SubCar->Calculation(rand(10, 50), $CarModel[$i][2]);  //台数：10~50台
    //
    echo "--生産台数：", $result[1], "台\n";
    echo "--金額：", $result[0], "万円\n";
    echo "\n";
    echo "\n";
    echo "\n";
    //
    //配列に追加しておく
    $arrNum[] = $result[1];
    $arrTotal[] = $result[0];
    //
}
//
//計算
echo "合計金額：", array_sum($arrTotal), "万円\n";
echo "平均金額：", array_sum($arrTotal)/array_sum($arrNum), "万円\n";
//
?>