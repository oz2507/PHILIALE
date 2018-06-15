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

        $date_str = date('YmdHis'); 
        $submit_file_name = $date_str . $file_name;

        $updir = "./book_img/";
        move_uploaded_file($submit_file_name,$book_img.$submit_file_name);

        if ($file_type != 'jpg' && $file_type != 'png' && $file_type != 'gif') {
            $errors['img_name'] = 'type';
        }
    }

	$book_title=$_POST['book_title'];
	$book_author=$_POST['book_author'];
	$comment=$_POST["comment"];


	$sql='UPDATE `future_archives` SET `book_title`=?, `book_author`=?, `book_img`=?, `comment`=? WHERE `id`=?';

	$data=array($book_title,$book_author,$book_img,$comment,$book_id);
	$stmt = $dbh->prepare($sql);
    $stmt->execute($data);

?>