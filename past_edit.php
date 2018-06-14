<?php 
	session_start();
	require('dbconnect.php');

	$book_id=$_SESSION['id'];

	//画像名を取得
    $book_img = $_FILES['book_img'];
        
    if (!empty($book_img)) {
        // 画像名の後ろから3文字を取得
        $file_type = substr($book_img, -3);
        // 大文字が含まれていた場合すべて小文字化
        $file_type = strtolower($file_type);

        if ($file_type != 'jpg' && $file_type != 'png' && $file_type != 'gif') {
            $errors['img_name'] = 'type';
        }
    }

	$book_title=$_POST['book_title'];
	$book_author=$_POST['book_author'];

	// $book_img=$_POST["book_img"];
	$comment=$_POST["comment"];


	$sql='UPDATE `past_archives` SET `book_title`=?, `book_author`=?, `comment`=? WHERE `id`=?';

	$data=array($book_title,$book_author,$comment,$book_id);
	$stmt = $dbh->prepare($sql);
    $stmt->execute($data);

    header("Location:mypage2.php");
?>