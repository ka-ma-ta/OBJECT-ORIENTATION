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

//配列
$arrNum = [];  //生産台数
$arrTotal = [];  //生産金額

//ループ：$arrCarの数
foreach ($arrCar as $key => $value) {
    //生産台数：10~50台
    $random = rand(10, 50);

    //インスタンス作成
    $car = new Car($value["name"], $value["capacity"], $value["price"], $value["speed"]);

    //結果を出力
    output($car->name, $random, $car->price);

    //各配列に値を入れておく
    $arrNum[] = $random;
    $arrTotal[] = $random * $car->price;

}

//計算, 表示
echo "\n";
echo "合計金額：", array_sum($arrTotal), "万円\n";
echo "平均金額：", array_sum($arrTotal) / array_sum($arrNum), "万円\n";