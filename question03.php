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
}

//結果を出力する関数
function output($proName, $proNnumber, $proPrice){
    echo $proName, "\n";
    echo "生産台数：", $proNnumber, "台\n";
    echo "金額：", $proPrice, "万円\n";
    echo "\n";
}

//配列
$arrNum = [];  //生産台数
$arrTotal = [];  //生産金額

//Honda
$random = rand(10, 50);
$honda = new Car('honda', 7, rand(251, 350), 20,);
output($honda->name, $random, $honda->price);
$arrNum[] = $random;
$arrTotal[] = $random * $honda->price;

//Nissan
$random = rand(10, 50);
$nissan = new Car('nissan', 5, rand(100, 250), 20);
output($nissan->name, $random, $nissan->price);
$arrNum[] = $random;
$arrTotal[] = $random * $nissan->price;

//Ferrari
$random = rand(10, 50);
$ferrari = new Car('ferrari', 2, rand(351, 500), 50);
output($ferrari->name, $random, $ferrari->price);
$arrNum[] = $random;
$arrTotal[] = $random * $ferrari->price;

//計算,表示
echo "\n";
echo "合計金額：", array_sum($arrTotal), "万円\n";
echo "平均金額：", array_sum($arrTotal)/array_sum($arrNum), "万円\n";