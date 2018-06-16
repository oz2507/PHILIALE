<?php

	session_start();
	require('dbconnect.php');

	// future_detail.phpの読んだへ追加からやってくる
	$book_id=$_GET['id'];

	// futureにあった情報を取得
	$sql='select * from future_archives where id=?';

	$data = array($book_id);
    $stmt = $dbh->prepare($sql); 
    $stmt->execute($data);

    // 取得した情報を変数へ
    $record=$stmt->fetch(PDO::FETCH_ASSOC);

    // past_archivesへデータを追加したい
	$insert_sql='insert into past_archives
		  set user_id=?, isbn_code=?, book_title=?, book_author=?, book_img=?, comment=?';

	$insert_data = array($_SESSION['id'],$record["isbn_code"],$record["book_title"],$record["book_author"],$record["book_img"],$record["comment"],);
    $insert_stmt = $dbh->prepare($insert_sql); 
    $insert_stmt->execute($insert_data);

    include("future_delete.php");

    header("Location:mypage2.php?isbn_code=".$record["isbn_code"]);

?>