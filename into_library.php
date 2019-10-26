<?php

session_start();
require('dbconnect.php');

$isbn = $_GET['isbn_code'];
$sql  = 'SELECT * FROM past_archives WHERE isbn_code = ?';
$data = array($isbn);
$stmt = $dbh->prepare($sql);
$stmt->execute($data);

$record = $stmt->fetch(PDO::FETCH_ASSOC);

$insert_sql  = 'INSERT INTO library_archives SET user_id = ?, isbn_code = ?, book_title = ?, book_author = ?, book_img = ?';
$insert_data = array($_SESSION['id'],$record["isbn_code"],$record["book_title"],$record["book_author"],$record["book_img"]);
$insert_stmt = $dbh->prepare($insert_sql);
$insert_stmt->execute($insert_data);

header("Location:mypage2.php");