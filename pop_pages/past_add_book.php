<?php

require('../dbconnect.php');
session_start();

$user_id = $_SESSION['id'];

if (isset($_POST['past_isbn'])) {
    $past_isbn = $_POST["past_isbn"];

    $data        = "https://www.googleapis.com/books/v1/volumes?q=isbn:$past_isbn";
    $json        = file_get_contents($data);
    $json_decode = json_decode($json);
    $posts       = $json_decode->items;

    if (isset($posts[0]->volumeInfo->title)) {
        $past_book   = $posts[0]->volumeInfo->title;
        $past_author = $posts[0]->volumeInfo->authors[0];

        $flag = 0;

        if (isset($_POST['past_story'])) {
            $past_comment = $_POST["past_story"];
        } else {
            $past_comment = '';
        }

    } else {
        $flag = 1;
        header("Location:../search_books/result_search.php?flag=".$flag);
    }
}

if (isset($_GET['isbn'])) {
    $past_isbn2 = $_GET['isbn'];

    if (isset($_POST['past_book'])) {
        $past_book2 = $_POST['past_book'];
    } else {
        $past_book2 = '';
    }

    if (isset($_POST['past_author'])) {
        $past_author2 = $_POST['past_author'];
    } else {
        $past_author2 = '';
    }

    if (isset($_POST['past_story'])) {
        $past_comment2 = $_POST['past_story'];
    } else {
        $past_comment2 = '';
    }

    $past_sql  = 'INSERT INTO `past_archives` SET `user_id` = ?, `isbn_code` = ?, `book_title` = ?, `book_author` = ?, `comment` = ?';
    $past_data = array($user_id,$past_isbn2,$past_book2,$past_author2,$past_comment2);
    $past_stmt = $dbh->prepare($past_sql);
    $past_stmt->execute($past_data);

    // header("Location: ../mypage2.php?isbn_code=" . $_GET['isbn']);
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
      <form action="past_add_book.php?isbn=<?php echo $past_isbn; ?>" method="post" class="form_original_2">
        <div>
          <textarea name="past_book"><?php echo $past_book; ?></textarea>
        </div>
        <div>
          <textarea name="past_author"><?php echo $past_author; ?></textarea>
        </div>
        <div>
          <textarea id="book_story" name="past_story" placeholder="  ここに解説文が入ります" readonly><?php echo $past_comment ?></textarea>
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