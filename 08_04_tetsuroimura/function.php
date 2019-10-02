<?php
//共通に使う関数を記述

//XSS対応（ echoする場所で使用！それ以外はNG ）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

//DB接続
function db_conn(){
//1.  DB接続します
try {
  //Password:MAMP='root',XAMPP=''
  //（追加）localhost=本番レンタルサーバーのアドレスに変更
  return new PDO('mysql:dbname=gs_kadai_2;charset=utf8;host=localhost','root','root');

} catch (PDOException $e) {
  exit('DB Connection Error:'.$e->getMessage());
}
}