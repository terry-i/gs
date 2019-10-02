<?php
//index.php（登録フォームの画面ソースコードを全コピーして、このファイルをまるっと上書き保存）
$id        = $_GET["id"];  //?id〜**を受け取る
$name      = $_GET["name"];
$writer    = $_GET["writer"];
$first     = $_GET["first"];
$recommend = $_GET["recommend"];
$memo      = $_GET["memo"];

include("function.php");
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE id=:id");
$stmt->bindValue(":id",$id,PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
// $view="";
if($status==false) {
  sql_error();
}else{
    $row = $stmt->fetch();

}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ更新</title>
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <style>div{padding: 10px;font-size:16px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
    </div>
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>[編集]</legend>
     <label>書籍名<input type="text" name="name" value="<?=$row["name"]?>"></label><br>
     <label>著者<input type="text" name="writer" value="<?=$row["writer"]?>"></label><br>
     <label>初版年月日<input type="text" name="first" value="<?=$row["first"]?>"></label><br>
     <label>5段間評価<input type="text" name="recommend" value="<?=$row["recommend"]?>"></label><br>
     <label><textArea name="memo" rows="4" cols="40"><?=$row["memo"]?></textArea></label><br>
     <input type="submit" value="送信">
     <input type="hidden" name="id" value="<?=$id?>"> 
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>



