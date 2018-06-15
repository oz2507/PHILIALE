<?php 

	session_start();
	require('dbconnect.php');

	$book_id=$_GET['id'];

	//画像名を取得
    $book_img = $_FILES['book_img']['name'];

    $errors=array();
    if (!empty($book_img)) {
        // 画像名の後ろから3文字を取得
        $file_type = substr($book_img, -3);
        // 大文字が含まれていた場合すべて小文字化
        $file_type = strtolower($file_type);

        if ($file_type != 'jpg' && $file_type != 'png' && $file_type != 'gif') {
            $errors['img_name'] = 'type';
        }else{
            $errors['img_name'] = 'blank';
        }
    }

        date_default_timezone_set('Asia/Manila');
        $date_str = date('YmdHis'); 
        $submit_file_name = $date_str.$book_img;

        move_uploaded_file($_FILES['book_img']['name'],'book_img/'.$submit_file_name);
    

	$book_title=$_POST['book_title'];
	$book_author=$_POST['book_author'];
	$comment=$_POST["comment"];


	$update_sql='UPDATE `future_archives` SET `book_title`=?, `book_author`=?, `book_img`=?, `comment`=? WHERE `id`=?';

	$update_data=array($book_title,$book_author,$book_img,$comment,$book_id);
	$update_stmt = $dbh->prepare($update_sql);
    $update_stmt->execute($update_data);

    // echo $data_str;
    // echo $submit_file_img;
    // echo $book_title;
    // echo $book_author;
    // echo $comment; 
    // echo $_GET['id'];

?>