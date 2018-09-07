<?php

session_start();
require('../dbconnect.php');

if (!empty($_POST)) {
    if ($_POST['book_title'] !== '') {
        $book        = $_POST["book_title"];
        $data        = "https://www.googleapis.com/books/v1/volumes?q=$book";
        $json        = @file_get_contents($data);
        $json_decode = json_decode($json);
        $posts       = $json_decode->items;
    }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>本の追加</title>

  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/style_re.css">
  <link rel="stylesheet" href="../assets/css/result_search.css">
</head>

<body>
<div class="container-fluid pop_header">
  <div class="row">
      <div class="col-xs-12 col-md-12">
        <p>本を再検索する</p>
        </div>
  </div>
</div>


<?php if (empty($_POST) || $_POST['book_title'] == '') { ?>
  <div class="container">
      <div class="row">
          <div class="col-xs-12 col-md-8 col-md-offset-2">
             <div class="row">
                  <div class="col-xs-12 text-center">
                      <div class="thumbnail" style="letter-spacing: 0.2em; line-height:1.65; border: none;">
              <p>isbnが正しくないもしくはisbnが入力されていません。<br>検索結果が得られなかった方は下記に本のタイトルを入力して下さい。</p>
              <img class="img-responsive" src="../assets/img/お辞儀1.png" style="width:100px;">
                </div>
                </div>
            </div>
          </div>
      </div>
  </div>


  <div class="row">
      <div class="col-xs-12 col-md-6 col-md-offset-3">
          <div class="new_book">
            <form action="result_search.php?flag=<?php echo $_GET['flag']; ?>" method="post" class="form_original_2">
               
            <div>
              <textarea type="text" id="book_title" name="book_title" placeholder="  本のタイトル"></textarea>
            </div>
          <div>
              <textarea id="book_story" name="book_story" placeholder="  解説文（54文字まで)"></textarea>
          </div>     
          <div>
              <button type="submit" name="" class="book_add_btn">検索する</button>
          </div>
        </form>
      </div>
      </div>
  </div><!-- row -->
<?php  } ?>

<?php if (!empty($_POST)) {
    if ($_POST['book_title'] !== '') { ?>

    <div class="container-head">
        <div class="row">
          <div class="col-xs-12 col-md-12">
            <div class="head">
              <h3>該当する本の追加するボタンを押して下さい。</h3>
              <h6>※空白部分は入力して情報を追加することができます。</h6>
            </div>          
          </div>
        </div>  
    </div>

    <?php foreach($posts as $post){ ?>
      <div class="container">
        <div class="row">
            <div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2">
              <form action="insert.php" method="post" class="list_form">              
              <div>
                <h5>本のタイトル</h5> 
                <?php if (isset($post->volumeInfo->title)){ ?>
                <textarea readonly="true" class="list_form" name="book_title"><?php echo $post->volumeInfo->title;?>
                </textarea>
              <?php }else{ ?>
                <textarea class="list_form" name="book_title" placeholder="タイトルを入力してください。">
                </textarea>
              <?php } ?>
              </div>
              <div>
                <h5>著者</h5>
                <?php if (isset($post->volumeInfo->authors[0])) { ?>
                <textarea readonly="true" class="list_form" name="book_author"><?php echo $post->volumeInfo->authors[0]; ?>
                </textarea>
              <?php }else{ ?>
                <textarea class="list_form" name="book_author" placeholder="著者を入力してください。">
                </textarea>
              <?php } ?>
              </div>
              <div class="add_btn">
                <button type="submit" class="import_btn">追加する</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    <?php } ?>
  <?php } ?>
<?php } ?>
</body>
</html>

<!-- <?php echo PHP_EOL;?> -->