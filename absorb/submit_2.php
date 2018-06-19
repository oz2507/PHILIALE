<?php  

	if (!empty($_POST['id'])) {
		header("Location: check.php?id=".$_POST['id']);

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
	  	<img src="https://placehold.jp/400x260.png?text=NO IMAGE" width="400">
	  </div>
	  <div class="col-xs-12 col-md-6 half-col_2">
	  	<h2>1 .<br></h2>
	  	<h3>Googleスプレットシートを開く</h3>
	  	<p>データの形は自由ですが、取得できるデータは<br>「作品名」と「著者」のみです。その他のデータが<br>あるとうまく取得できない可能性があります。</p>
	  </div>
	</div>

<!-- import explain_2 -->
	<div class="row">
		<div class="content">
		  <div class="col-xs-12 col-md-6 half-col_2">
		  	<h2>2 .<br></h2>
		  	<h3>URLをコピーする</h3>
		  	<p>コピーする場所は<br><span>「https://docs.google.com/spreadsheets/d/」</span>の後ろから<br><span>「/edit?usp=drive_web&ouid=????????」</span>の前までです。</p>
		  </div>
		  <div class="col-xs-12 col-md-6 half-col_1">
		  	<img src="https://placehold.jp/400x260.png?text=NO IMAGE" width="400">
		  </div>
		</div>
	</div>

<!-- import explain_3 -->
	<div class="row">
	  <div class="col-xs-12 col-md-6 half-col_1">
	  	<img src="https://placehold.jp/400x260.png?text=NO IMAGE" width="400">
	  </div>
	  <div class="col-xs-12 col-md-6 half-col_2">
	  	<h2>3 .<br></h2>
	  	<h3>下の入力欄にペーストする</h3>
	  	<p>２、３の手順について<br>Macの場合→⌘C(コピー)→⌘V(ペースト)」<br>Windowsの場合→「Ctrl+C→Ctrl+V」とすると楽です。</p>
	  </div>
	</div>

<!-- URL input display -->

<form action="submit_2.php" method="POST" class="submit_form">
	<div class="row">
		<div class="col-xs-8 col-xs-offset-2 col-md-6 col-md-offset-3">
		 <!-- <form action="submit.php" method="POST" class="submit_form"> -->

	<div class="row">
		<div class="col-xs-8 col-xs-offset-2 col-md-6 col-md-offset-3">
		 <form action="submit_2.php" method="POST" class="submit_form">

		  <input type="text" name="id" placeholder="URL入力欄">
		  <input type="submit" name="送信" id="submit_btn" value="検索する">
		 <!-- </form> -->
		</div>
    </div>

</form>

  </div><!-- container -->
</body>
</html>