<?php
//1. POSTデータ取得
//$name = filter_input( INPUT_GET, ","name" ); //こういうのもあるよ
//$email = filter_input( INPUT_POST, "email" ); //こういうのもあるよ
$name=$_POST["name"];
$writer=$_POST["writer"];
$first=$_POST["first"];
$recommend=$_POST["recommend"];
$memo=$_POST["memo"];

//2. DB接続します
include("function.php");
$pdo=db_conn();


//３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(name,writer,first,recommend,memo,indate)VALUES(:name,:writer,:first,:recommend,:memo,sysdate());");
$stmt->bindValue(':name', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':writer', $writer, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':first', $first, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':recommend', $recommend, PDO::PARAM_INT); 
$stmt->bindValue(':memo', $memo, PDO::PARAM_STR); 
$status = $stmt->execute();  //（追加）実行

//４．データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("SQLError:".$error[2]);
}else{
  //５．index.phpへリダイレクト
  header("Location: index.php"); 
  exit();

}
?>