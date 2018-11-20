<?php

require('../dbconnect.php');
session_start();

$user_id = $_SESSION['id'];

if (isset($_POST['future_isbn'])) {
    $future_isbn = $_POST["future_isbn"];

    $data        = "https://www.googleapis.com/books/v1/volumes?q=isbn:$future_isbn";
    $json        = @file_get_contents($data);
    $json_decode = json_decode($json);
    $posts       = $json_decode->items;

    if (isset($posts[0]->volumeInfo->title)) {
        $flag = 0;

        $user_id       = $_SESSION["id"];
        $future_book   = $posts[0]->volumeInfo->title;
        $future_author = $posts[0]->volumeInfo->authors[0];

        if (isset($_POST['comment'])) {
            $future_comment = $_POST["comment"];
        } else {
            $future_comment = '';
        }
    } else {
        $flag = 1;
        header("Location: ../mypage2.php?flag=".$flag);
    }
}

if (isset($_GET['isbn'])) {
    $future_isbn2 = $_GET['isbn'];

    if (isset($_POST['future_book'])) {
        $future_book2 = $_POST['future_book'];
    } else {
        $future_book2 = '';
    }

    if (isset($_POST['future_author'])) {
        $future_author2 = $_POST['future_author'];
    } else {
        $future_author2 = '';
    }

    if (isset($_POST['future_story'])) {
        $future_comment2 = $_POST['future_story'];
    } else {
        $future_comment2 = '';
    }

    $future_sql  = 'INSERT INTO `future_archives` SET `user_id` = ?, `isbn_code` = ?, `book_title` = ?, `book_author` =?, `comment` = ?';

    $future_data = array($user_id,$future_isbn2,$future_book2,$future_author2,$future_comment2);
    $future_stmt = $dbh->prepare($future_sql);
    $future_stmt->execute($future_data);

    header("Location: ../mypage2.php");
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>PHILIALE</title>
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css"><!-- グリッドシステムのみ -->
  <link rel="stylesheet" type="text/css" href="../assets/css/style_r.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/pop_pages.css">
</head>
<body>
  <div class="container-fluid pop_header">
  	<div class="row">
  	  <div class="col-xs-12 col-md-12">
  	    <p>登録本の確認</p>
	  	<!-- <a href="#">✕</a> -->
	  </div>
    </div>
  </div>

  <?php if ($flag == 0) { ?>
  <div class="container" style="">

  	<div class="row">
  		<div class="pop_p">
  	  	  <p>この内容で間違いありませんか？</p>
  	  	</div>
  	  	<div class="col-xs-12 col-md-6 col-md-offset-3">
  	  	  <div class="book_img">
  	  	  	<img class="book_pic" src="https://placehold.jp/b96cc4/ffffff/210x296.png?text=NO IMAGE" width="148">
  	  	  </div>
  	  	</div>
    </div><!-- row -->


    <div class="row">
  	  	<div class="col-xs-12 col-md-6 col-md-offset-3">
			<form action="future_add_check.php?isbn=<?php echo $future_isbn; ?>" method="post" class="form_original_2">
			  <div>
			    <textarea name="future_book"><?php echo $future_book; ?></textarea>
			  </div>
			  <div>
			    <textarea name="future_author"><?php echo $future_author; ?></textarea>
			  </div>
			  <div>
			    <textarea id="book_story" name="future_story" placeholder="  ここに解説文が入ります" readonly><?php echo $future_comment ?></textarea>
			  </div>
			  <div>
			  	<button type="submit" name="" class="book_add_btn">保管する</button>
			  </div>
			</form>
		</div>
    </div><!-- row -->

  </div><!-- container -->
	<?php }else{ ?>
		<p>isbnが違う可能性があります。</p>
		<a href="../mypage2.php">マイページに戻る。</a>
	<?php } ?>
</body>
</html>