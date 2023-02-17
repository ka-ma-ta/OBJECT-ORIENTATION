<?php 
//
//Carクラス
class Car {
    //
    public $name;
    public $capacity;
    public $price;
    public $speed;
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
        echo "～初期値～", "\n";
        echo "車種名：", $name, "\n";
        echo "--定員：", $capacity, "人\n";
        echo "--価格：", $price, "万円\n";
        echo "--加速：", $speed, "m/s\n";
        echo "\n";
        echo "--アクセル：あり\n";
        echo "--ブレーキ：あり\n";
        echo "\n";
    }
    //
}
//
//Ferrariクラス
class Ferrari extends Car{
    //
    //関数：出力
    function Output($result, $r_Height, $r_Speed){
        echo $result, "\n";
        echo "--車高：", $r_Height, "mm\n";
        echo "--加速：", $r_Speed, "mm\n";
    }
    //
    //関数：リフトアップ or リフトダウン
    function ChangeHeight($subSpeed){
        //車高：標準は0
        $height = 0;
        //
        //ループ：5回
        For($i=1; $i<=5; $i++){
            //回数出す
            echo $i,"回目\n";
            //ランダム値の作成
            $random = rand(1, 2);
            //
            //1→リフトアップ　2→リフトダウン
            //比較演算子に注意!!
            if($random==1){
                //リフトアップ
                if($height==0){
                    $height=40;
                    $subSpeed = $subSpeed*0.8;
                    echo "リフトアップ出来ました。", "\n";
                    echo "--車高：", $height, "mm\n";
                    echo "--加速：", $subSpeed, "m/s\n";
                }else{
                    echo "リフトアップ出来ませんでした。", "\n";
                    echo "--車高：", $height, "mm\n";
                    echo "--加速：", $subSpeed, "m/s\n";
                }
                //
            }else{
                //リフトダウン
                if($height==40){
                    $height=0;
                    $subSpeed = $subSpeed/0.8;
                    echo "リフトダウン出来ました。", "\n";
                    echo "--車高：", $height, "mm\n";
                    echo "--加速：", $subSpeed, "m/s\n";
                }else{
                    echo "リフトダウン出来ませんでした。", "\n";
                    echo "--車高：", $height, "mm\n";
                    echo "--加速：", $subSpeed, "m/s\n";
                }
                //
            }  
            //改行
            echo "\n";
            //
        }
        //
    }
    //
}
//
//実行
$Ferrari = new Ferrari('ferrari', 2, 300, 50);
$Ferrari->ChangeHeight(50);  //ここ！！
//
//
?>