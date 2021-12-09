<?php

//var_dump($_POST);
//exit();

//データをinputから受け取る
$name = $_POST["name"];
$email = $_POST["email"];

//データを配列に入れる
$list = array(
    array("{$name},{$email}")
);

//ファイルを開く、引数"a"はファイルの開き方の一種
$file = fopen("data/sample.csv", "a");

//ファイルをロックする
flock($file, LOCK_EX);

//指定したファイルに指定したデータを書き込む
if ($file) {
    foreach ($list as $value) {
        fputcsv($file, $value);
    }
};

//ファイルのロックを解除する
flock($file, LOCK_UN);

//ファイルを閉じる
fclose($file);

//データ入力画面に遷移する
header("LOCATION:practice_input.php");
