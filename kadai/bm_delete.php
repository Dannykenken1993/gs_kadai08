<?php
$bookid = $_GET["id"];

include "funcs.php";
$pdo = db_con();

$sql = "DELETE FROM gs_bm_table WHERE bookid=:bookid";
$stmt = $pdo->prepare($sql);
$stmt->bindvalue(':bookid', $bookid, PDO::PARAM_INT);
$status = $stmt->execute();



if($status == false){
    sqlError($stmt);
} else {
    header("Location: bm_select.php");
    exit;
}
