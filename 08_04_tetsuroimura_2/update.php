<?php
//1. POSTデータ取得
$name   = $_POST["name"];
$lid    = $_POST["lid"];
$lpw    = $_POST["lpw"];
$naiyou = $_POST["kanri_flg"];
$naiyou = $_POST["life_flg"];
$id     = $_POST["id"];

//2. DB接続します
include("funcs.php");
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("UPDATE gs_an_table SET name=:name,email=:email,naiyou=:naiyou WHERE id=:id");
$stmt->bindValue(':name',      $name,      PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lid',       $lid,       PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':lpw',       $lpw,       PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':kanri_flg', $kanri_flg, PDO::PARAM_STR);
$stmt->bindValue(':life_flg',  $life_flg,  PDO::PARAM_STR);
$stmt->bindValue(':id',        $id,        PDO::PARAM_INT); 
$status = $stmt->execute(); //実行

//４．データ登録処理後
if($status==false){
  sql_error();
}else{
  redirect("select.php");
}

?>
