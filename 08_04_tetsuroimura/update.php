<?php
//1. POSTデータ取得
$name      = $_POST["name"];
$writer    = $_POST["writer"];
$first     = $_POST["first"];
$recommend = $_POST["recommend"];
$memo      = $_POST["memo"];
$id        = $_POST["id"];

//2. DB接続します
include("function.php");
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("UPDATE gs_bm_table SET name=:name,writer=:writer,first=:first recommend=:recommend memo=:memo WHERE id=:id");
$stmt->bindValue(':name',      $name,      PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':writer',    $writer,    PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':first',     $first,     PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':recommend', $recommend, PDO::PARAM_STR); 
$stmt->bindValue(':memo',      $memo,      PDO::PARAM_STR); 
$stmt->bindValue(':id',        $id,        PDO::PARAM_INT); 
$status = $stmt->execute(); //実行

//４．データ登録処理後
if($status==false){
  sql_error();
}else{
  redirect("select.php");
}

?>
