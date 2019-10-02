<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>データ登録</title>
  <!-- <link href="css/bootstrap.min.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="style.css">
  <style>div{padding: 10px;font-size:18px;}</style>
</head>
<body>

<!-- Head[Start] -->
<header>
  <!-- <nav class="navbar navbar-default">
    <div class="container-fluid"> -->
    <!-- <div class="navbar-header"><a class="navbar-brand" href="select.php">ビジネス書評</a></div> -->
    <div class="navbar-header">ビジネス書評入力フォーム</div>
    <!-- </div> -->
  </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->
<form method="POST" action="insert.php">
  <div class="jumbotron">
   <fieldset>
    
     <label id="name">書籍名<input type="text" name="name" id="box_name"></label><label><br>
     <label id="writer">著者<input type="text" name="writer" id="box_writer"></label><br>
     <label id="first">初版年月日<input type="text" name="first" id="box_first"></label><br>
     <label id="recommend">5段階評価<input type="text" name="recommend" id="box_recommend"></label><br>
     <p id="syohyou">書評</p>
     <label id="memo"><textArea name="memo" rows="3" cols="120" id="box_memo"></textArea></label><br>
     <input type="submit" value="送信" id="send">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->


</body>
</html>