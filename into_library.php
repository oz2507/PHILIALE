<?php 

	// 寄贈する、のボタンを押したらlibrary_archivesに走る 
	session_start();
	
	require('dbconnect.php');

	$insert_sql='insert into library_archives set user_id=?, isbn_code=?, book_title=?, book_author=?, book_img=?, comment=?';

	$insert_data = array($_SESSION['id'],$isbn_record["isbn_code"],$isbn_record["book_title"],$isbn_record["book_author"],$isbn_record["book_img"],$isbn_record["comment"],);
   	$insert_stmt = $dbh->prepare($insert_sql); 
   	$insert_stmt->execute($insert_data);


?>