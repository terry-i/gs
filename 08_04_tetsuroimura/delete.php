<?php
//1. POSTデータ取得
$id     = $_GET["id"];

//2. DB接続します
include("function.php");
$pdo = db_conn();

//３．データ登録SQL作成
$stmt = $pdo->prepare("DELETE FROM gs_bm_table WHERE id=:id");
$stmt->bindValue(':id',$id,PDO::PARAM_INT); 
$status = $stmt->execute(); //実行

//４．データ登録処理後
if($status==false){
  sql_error();
}else{
  redirect("select.php");
}

?>
