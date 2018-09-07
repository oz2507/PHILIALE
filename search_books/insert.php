<?php 

session_start();
require('../dbconnect.php');

$user_id = $_SESSION["id"];
$title   = $_POST['book_title'];
$author  = $_POST['book_author'];

$sql  = 'INSERT INTO past_archives SET user_id = ?, book_title = ?, book_author = ?';
$data = array($user_id,$title,$author);
$stmt = $dbh->prepare($sql);
$stmt->execute($data);

header("Location:../mypage2.php");