<?php

$bookname = $_POST["bookname"];
$link = $_POST["link"];
$star = $_POST["star"];
$naiyou = $_POST["naiyou"];

include "funcs.php";
$pdo = db_con();

$sql = "INSERT INTO gs_bm_table(bookname,link,star,naiyou,bookindate) VALUES(:bookname,:link,:star,:naiyou,sysdate())";
$stmt = $pdo->prepare($sql);
$stmt->bindvalue(':bookname', $bookname, PDO::PARAM_STR);
$stmt->bindvalue(':link', $link, PDO::PARAM_STR);
$stmt->bindvalue(':star', $star, PDO::PARAM_STR);
$stmt->bindvalue(':naiyou', $naiyou, PDO::PARAM_STR);

$status = $stmt->execute();

if($status == false){
    sqlError($stmt);
} else {
    header("Location: bm_index.php");
    exit;
}
