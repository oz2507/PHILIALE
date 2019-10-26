<?php

if (isset($_GET['id'])) {
    $id          = $_GET['id'];
    $data        = "https://spreadsheets.google.com/feeds/list/$id/od6/public/values?alt=json";
    $json        = @file_get_contents($data, false, stream_context_create($options));
    $json_decode = json_decode($json);

    if ($json_decode == null) {
        echo '';
    } else {
        $books = $json_decode->feed->entry;
    }
}

?>

<!DOCTYPE html>
<html lang="ja">
  <head>
    <title>スプレッドシート</title>
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css"><!-- グリッドシステムのみ -->
    <link rel="stylesheet" href="../assets/css/bootstrap.phl.css">
    <link rel="stylesheet" type="text/css" href="../assets/css/style_absorb.css">
    <?php require("../partial/favicon.php"); ?>
  </head>
  <body>
    <!-- navbar -->
    <div class="nav_container navbar-fixed-top">
      <div class="nav_header">
        <img alt="philia" src="../assets/img/philia2.png" style="height: 35px;">
      </div>
    </div>

    <!-- main -->
    <div class="container">
      <!-- import button -->
      <div class="row">
        <div class="head">
          <h1>検索結果</h1>

          <?php if (!empty($books)) : ?>
            <a href="absorb.php?id=<?php echo $id; ?>">
              <button class="import_btn">この内容でフィリアールの書庫に保管</button>
            </a>
          <?php endif; ?>
        </div>
      </div>

      <!-- <h1>検索結果</h1> -->
      <?php if ($json_decode !== null) :
          foreach ($books as $book) : ?>
        <div class="row">
          <div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2">
            <div class="list_form">
              <p>作品名 :<span><?php echo $book->title->{'$t'}; ?>&ensp;</span></p>
              <p>著者名 :<span><?php echo $book->{'gsx$作者'}->{'$t'}; ?></span></p>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
      <?php else :
        $message = "IDが正しくない可能性があります。"; ?>
        <div style="text-align: center;">
          <p><?php echo $message; ?></p>
          <a href="submit_2.php"><button class="import_btn">戻る</button></a>
        </div>
      <?php endif; ?>

    </div><!-- container -->

    <?php include('../partial/footer_top.php'); ?>
  </body>
</html>