<?php 

	session_start();

	require('dbconnect.php');

	if (isset($_POST['isbn'])) {
		$isbn = $_POST["isbn"];

	  	$data = "https://www.googleapis.com/books/v1/volumes?q=isbn:$isbn";
		$json = file_get_contents($data);
	 	$json_decode = json_decode($json);
	  	// jsonデータ内の『entry』部分を複数取得して、postsに格納
	  	$posts = $json_decode->items;
	
		if (isset($posts[0]->volumeInfo->title)) {

		$user_id=$_SESSION["id"];
		$book=$posts[0]->volumeInfo->title;
		$author=$posts[0]->volumeInfo->authors[0];
		$img = $_POST["img"];
		$comment=$_POST["comment"];

		$sql='INSERT INTO `past_archives`
			  SET `user_id`=?, `isbn_code`=?, `book_title`=?, `book_author`=?, `book_img`=?, `comment`=?';

		$data=array($user_id,$isbn,$book,$author,$img,$comment);
		$stmt = $dbh->prepare($sql);
	    $stmt->execute($data);

		}else{
			echo "isbnを入力してください。";
		}
	}

?>