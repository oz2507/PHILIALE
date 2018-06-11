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

	 }

	 // elseif (isset($_POST['book'])) {
	 //  $book = $_POST["book"];
	 //  $data = "https://www.googleapis.com/books/v1/volumes?q=$book&$author";
	 //  $json = file_get_contents($data);
	 //  $json_decode = json_decode($json);

	 //  $posts = $json_decode->items;
	 // }

	$user_id=$_SESSION["id"];
	$book=$posts[0]->volumeInfo->title;
	$author=$posts[0]->volumeInfo->authors[0];
	$img = $_POST["img"];
	$comment=$_POST["comment"];


	$sql='INSERT INTO `future_archives`
		  SET `user_id`=?, `isbn_code`=?, `book_title`=?, `book_author`=?, `book_img`=?, `comment`=?';

	$data=array($user_id,$isbn,$book,$author,$img,$comment);
	$stmt = $dbh->prepare($sql);
    $stmt->execute($data);

    

	// header("Location:mypage2.php");



?>

<!-- <!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>add</title>
</head>
<body>
	<h3>検索結果</h3>
  
		<?php if (isset($_POST['isbn'])) {
		<p>本のタイトル :<?php echo $posts[0]->volumeInfo->title; ?></p>

		<p>著者 :</p>
		<?php 
		$authors = $posts[0]->volumeInfo->authors;
		foreach ($authors as $author) { 
		echo $author; 
		?>
		<span>/</span>
		<?php }} ?>
		<?php elseif(isset($_POST['book'];)){} ?>
	
</body>
</html> -->