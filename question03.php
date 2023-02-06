<?php  

//Carクラス
class Car {

    private $name;
    private $capacity;
    private $price;
    private $speed;

    //アクセル
    function accelerator(){
        //
    }

    //ブレーキ
    function brake(){
        //
    }

}

/*
//Honda
$Honda = new Car('honda', 7, 150, 20,);
//Nissan
$Nissan = new Car('nissan', 7, 100, 20);
//Ferrari
$Ferrari = new Car('ferrari', 2, 300, 50);
*/

//関数：ランダム数の作成（台数）
function Number(){
    //1~20のランダムな整数を作成
    $random01 = rand(1, 20);
    //作成した数値を返す
    return $random01;
    //
}
//
//関数：ランダム数の作成（価格）
function Price(){
    //100~500のランダムな整数を作成
    $random02 = rand(100, 500);
    //作成した数値を返す
    return $random02;
    //
}
//
//Honda作成
$max = Number();
$subprice = Price();
For($i=0; $i<$max; $i++){
    //
    $Honda = new Car('honda', 7, $subprice, 20,);
    //
}


?>