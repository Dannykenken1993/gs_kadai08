<?php


$bookid = $_GET["id"];
include "funcs.php";
$pdo = db_con();


$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE bookid=:bookid");
$stmt->bindValue(':bookid', $bookid, PDO::PARAM_INT);
$status = $stmt->execute();


$view = "";
if ($status == false){
    sqlError($stmt);
} else {
    $row = $stmt->fetch();
}

?>


<!DOCTYPE html>
<html land="ja">
<head>
    <meta charset="UTF-8">
    <title>データ登録</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>div{padding: 10px;font-size:16px}</style>
</head>

<body>
<header>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
    <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
    </div>
  </nav>
</header>
<form method="post" action="bm_update.php">
  <div class="jumbotron">
   <fieldset>
    <legend>更新：ブックマーク</legend>
     <label>本：<input type="text" name="bookname" value="<?=$row['bookname']?>"></label><br>
     <label>リンク：<input type="text" name="link" value="<?=$row['link']?>"></label><br>
     <label>評価：<input type="text" name="star" value="<?=$row['star']?>"></label><br>
     <label><textArea name="naiyou" rows="4" cols="40"><?=$row['naiyou']?></textArea></label><br>
     <input type="hidden" value="<?=$row['bookid']?>"    name='bookid'>
     <input type="submit" value="送信">
    </fieldset>
  </div>
</form>
<!-- Main[End] -->










</body>


</html>


