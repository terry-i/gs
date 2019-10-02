<?php
include("function.php");
$pdo = db_conn();

$stmt = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt->execute();

$view="";
// var_dump($stmt);
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("SQLError:".$error[2]);

  }else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $r = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    // $view .= $r["id"]."-".$r["name"].",".$r["writer"].",".$r["first"].",".$r["recommend"].",".$r["memo"]."<br>";
  
  $view .='<p class="block">';
  $view .='<a href="detail.php?id='.$r["id"].'">';
  $view .= "<table class='enter'>
  <tr>
  <td>".$r['id']."</td>
  <td class='table_name'>".$r['name']."</td>
  <td>".$r['writer']."</td>
  <td>".$r['first']."</td>
  <td>".$r['recommend']."</td>
  <td>".$r['memo']."</td>
  </tr>
  </table>";
  $view.='</a>';
  
  // $view.="　";

  $view .='<a href="delete.php?id='.$r["id"].'" class="delete">';
  $view .= "[削除]";
  $view.='</a>';
  $view .='</p>';

  }
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>フリーアンケート表示</title>
<link rel="stylesheet" href="style.css">

<!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">

<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div>
      <a class="navbar-brand" href="index.php">ビジネス書書評</a>
      </div>
    </div>
  </nav>
</header>



<div>
    <div class="container jumbotron"><?php echo $view ?></div>
</div>


</body>
</html>