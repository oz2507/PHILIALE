<?php

if (!empty($_POST['id'])) {
    header("Location: check.php?id=".$_POST['id']);
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <title>スプレッドシート</title>
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css"><!-- グリッドシステムのみ -->
   <link rel="stylesheet" href="../assets/css/bootstrap.phl.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/style_absorb.css">
  <?php require('../partial/favicon.php'); ?>
</head>
<body>

<!-- navbar -->
<div class="nav_container navbar-fixed-top">
  <div class="nav_header">
    <a href="../mypage2.php">
      <img alt="philia" src="../assets/img/philia2.png" style="height: 35px;">
    </a>
  </div>
</div>

<!-- main -->
<div class="container">

<!-- head message -->
  <div class="row">
    <div class="head">
      <h1>Googleスプレットシートを読み込む</h1>
        <p>すでに管理してしまっている人も簡単に<br>保管データを移行することが出来ます。</p>
    </div>
  </div>

<!-- import explain_1 -->
  <div class="row">
    <div class="col-xs-12 col-md-6 half-col_1">
      <img src="../assets/img/sheet.png" width="400">
     </div>
    <div class="col-xs-12 col-md-6 half-col_2">
      <h2>1 .<br></h2>
      <h3>Googleスプレットシートを開く</h3>
      <!-- <p>取得できるデータは「作品名」と「著者」のみです。その他のデータがあるとうまく取得できない可能性があります。</p> -->
      <p>左の画像のように、｢A2以下のA列に本のタイトル｣を、｢B2以下のB列に著者｣を記入して下さい。</p>
      <p>尚、スプレッドシートの読み込みには、共有設定が必要となります。</p>
    </div>
  </div>

<!-- import explain_2 -->
  <div class="row">
    <div class="content">
      <div class="col-xs-12 col-md-6 half-col_2">
        <h2>2 .<br></h2>
          <h3>共有設定をする</h3>
            <p>該当のスプレッドシートを開き、｢ファイル｣→｢ウェブに公開｣を選択して下さい。</p>
            <p>次に、当館に登録したいスプレッドシートを選択して下さい。</p>
      </div>
    <div class="col-xs-12 col-md-6 half-col_1">
      <img src="../assets/img/open.png" width="400">
    </div>
    </div>
  </div>

  <!-- import explain_3 -->
  <div class="row">
    <div class="col-xs-12 col-md-6 half-col_1">
      <img src="../assets/img/id1.png" width="400" height="300">
    </div>
    <div class="col-xs-12 col-md-6 half-col_2">
      <h2>3 .<br></h2>
      <h3>スプレッドシートのIDをコピーする</h3>
              <p>コピーする場所は<br><span>「https://docs.google.com/spreadsheets/d/」</span>の後ろから<span>「/edit#gid=0」</span>の前までです。</p>
              <p>取得したIDを下記の欄に入力して下さい。</p>
    </div>
  </div>

  <!-- URL input display -->
    <form action="submit_2.php" method="POST" class="submit_form">
      <div class="row">
        <div class="col-xs-8 col-xs-offset-2 col-md-6 col-md-offset-3">
          <input type="text" name="id" placeholder="スプレッドシートID入力欄">
          <input type="submit" name="送信" id="submit_btn" value="Read Spreadsheet">
        </div>
      </div>
    </form>

  </div><!-- container -->

<?php include('../partial/footer_top.php') ?>
</body>
</html>