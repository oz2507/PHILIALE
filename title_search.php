<?php

if ($_POST['book_title'] !== '') {
    $book        = $_POST["book_title"];
    $data        = "https://www.googleapis.com/books/v1/volumes?q=$book";
    $json        = file_get_contents($data);
    $json_decode = json_decode($json);
    $posts       = $json_decode->items;
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>本の追加</title>
</head>
<body>
  <div class="container-fluid pop_header2">
    <div class="row">
      <div class="col-xs-12 col-md-6 col-md-offset-3">
          <p>　本を登録する </p>
      </div>
    </div>
  </div>

  <?php if ($_POST['book_title'] == '') : ?>
  <div class="container" style="margin-bottom: 50px;">
    <div class="row">
      <div class="col-xs-12 col-md-6 col-md-offset-3">
        <div class="book_img2">
          <img class="book_pic2" src="https://placehold.jp/b96cc4/ffffff/210x296.png?text=NO IMAGE" width="148">
        </div>
      </div>
    </div><!-- row -->

    <div class="row">
      <div class="col-xs-12 col-md-6 col-md-offset-3">
        <div class="new_book">

          <form action="title_search.php?flag=<?php echo $_GET['flag']; ?>" method="post">
            <div>
              <input type="text" id="book_title" name="book_title" placeholder="  本のタイトル">
            </div>
            <div>
              <textarea id="book_story" name="book_story" placeholder="  解説文（54文字まで)"></textarea>
            </div>
            <div>
              <button type="submit" name="" class="book_add_btn2">検索する</button>
            </div>
          </form>

        </div>
      </div>
    </div><!-- row -->
  </div><!-- container -->
  <?php else :
      foreach ($posts as $post) :?>
  <form>
    <p>本のタイトル :<?php echo $post->volumeInfo->title; ?></p>
    <p>著者 :<?php echo $post->volumeInfo->authors[0]; ?></p>
    <!-- <p>ISBN :<?php // echo $post->industryIdentifiers[1]->identifier; ?></p> -->
    <button type="submit">追加する</button>
  </form><br>
  <p>---------------------------------------------</p>
  <?php endforeach; ?>
  <?php endif; ?>
</body>
</html>