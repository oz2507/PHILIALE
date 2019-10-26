<?php

session_start();
require('dbconnect.php');

$book_id = $_GET['id'];

$sql = 'SELECT * FROM `future_archives` WHERE `id` = ?';

$data = array($book_id);
$stmt = $dbh->prepare($sql);
$stmt->execute($data);

$record = $stmt->fetch(PDO::FETCH_ASSOC);

$insert_sql = 'INSERT INTO past_archives SET user_id = ?, isbn_code = ?, book_title = ?, book_author = ?, book_img = ?, comment = ?';

$insert_data = array($_SESSION['id'],$record["isbn_code"],$record["book_title"],$record["book_author"],$record["book_img"],$record["comment"],);
$insert_stmt = $dbh->prepare($insert_sql);
$insert_stmt->execute($insert_data);

include("future_delete.php");
header("Location:mypage2.php?isbn_code=" . $record["isbn_code"]);