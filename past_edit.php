<?php 
	session_start();
	require('dbconnect.php');

	$book_id=$_SESSION['id'];

	$book_title=$_POST['book_title'];
	$book_author=$_POST['book_author'];
	$book_img=$_POST["book_img"];
	$comment=$_POST["comment"];


	$sql='UPDATE `past_archives` SET `book_title`=?, `book_author`=?, `book_img`=?, `comment`=? WHERE `id`=?';

	$data=array($book_title,$book_author,$book_img,$comment,$book_id);
	$stmt = $dbh->prepare($sql);
    $stmt->execute($data);
?>