<?php 
	session_start();
	require('dbconnect.php');

	$errors=array();

	if (!empty($_POST)) {

		$book_id=$_GET['id'];

		//画像名を取得
	    $book_img = $_FILES['book_img']['name'];
	        
	    if (!empty($book_img)) {
	        // 画像名の後ろから3文字を取得
	        $file_type = substr($book_img, -3);
	        // 大文字が含まれていた場合すべて小文字化
	        $file_type = strtolower($file_type);

	        if ($file_type != 'jpg' && $file_type != 'png' && $file_type != 'gif') {
	            $errors['img_name'] = 'type';
	        }

	    }
	        else{
	              //ファイルがないときの処理
	            $errors['img_name'] = 'blank';
	        }
    }

	
    if(empty($errors)){
    	  date_default_timezone_set('Asia/Manila');
        $date_str = date('YmdHis'); 
        $submit_file_name = $date_str.$book_img;

        move_uploaded_file($_FILES['book_img']['tmp_name'],'book_img/'.$submit_file_name);
	


	$book_title=$_POST['book_title'];
	$book_author=$_POST['book_author'];
	$img=$submit_file_name;
	$comment=$_POST["comment"];


	$sql='UPDATE `past_archives` SET `book_title`=?, `book_author`=?, `book_img`=?,`comment`=? WHERE `id`=?';

	$data=array($book_title,$book_author,$img,$comment,$book_id);
	$stmt = $dbh->prepare($sql);
    $stmt->execute($data);
}


  // var_dump($book_img);
  // var_dump($submit_file_name);
  // var_dump($img);
  // var_dump($date_str);


  header("Location:mypage2.php");

?>