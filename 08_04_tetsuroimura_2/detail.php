<?php
$id         = $_GET["id"];
$name       = $_GET["name"];
$lid        = $_GET["lid"];
$lpw        = $_GET["lpw"];
$kanri_flg  = $_GET["kanri_flg"];
$life_flg   = $_GET["life_flg"];
$id         = $_GET["id"];

// echo $id;
include("funcs.php");
$pdo = db_conn();

//２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM gs_user_table WHERE id=:id");
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
    <legend>[管理者更新]</legend>
     <label>名前<input type="text" name="name" value="<?=$row["name"]?>"></label><br>
     <label>ログインID<input type="text" name="lid" value="<?=$row["lid"]?>"></label><br>
     <label>パスワードID<input type="text" name="lpw" value="<?=$row["lpw"]?>"></label><br>
     <label>管理フラグ<input type="text" name="kanri_flg" value="<?=$row["kanri_flg"]?>"></label><br>
     <label>ライフフラグ<input type="text" name="life_flg" value="<?=$row["life_flg"]?>"></label><br>
     <input type="submit" value="送信">
     <input type="hidden" name="id" value="<?=$id?>"> 
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>



