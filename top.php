<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="target-densitydpi=device-dpi, width=device-width, maximum-scale=1.0, user-scalable=yes">

	<title>PHILIALE</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">

	<link rel="stylesheet"x href="assets/css/styles.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">
	<link rel="stylesheet" href="assets/fonts/Roboto_Condensed">
	<link rel="stylesheet" href="philiale_mypage/assets/css/mystyle.css">
	<link rel="stylesheet" href="assets/css/top.css">


</head>
<body>
<!-- navbar -->
<?php require('partial/navbar.php'); ?>



<!-- header -->
<div class="header">
	<img src="assets/img/head.jpg" alt="head-design">
</div>

<!-- what's philiale -->
<div class="box">
	<div id="what" class="container-what">
		<div class="title">
			<h1>WHAT'S PHILILALE?</h1>
		</div>
		<div class="row">
			<div class="desc pull-right">
				<img src="assets/img/pc.jpg" alt="pc_img" class="pc_only">
			</div>
			<div class="desc pull-left phone_only">
				<h3>読書フェチのためのWeb上の書庫です。</h3>
				<p>フィリアールは<font color="#8f4796">読み終わった本や読みたい本を保管するため</font>の<br>あなた専用のWeb上の書庫です。</p>
				<p>フィリアールで本を保管しておけば、<font color="#8f4796">あなたに代わって本の詳細を記載して</font>いつでも引き出せるように本を管理することができます。</p>
				<p>利用方法はとてもシンプルで、<font color="#8f4796">本のタイトルを入力する</font>だけ。<br>フィリアールはあなたの<font color="#8f4796">愛する本を簡単にそして美しく</font>管理することができます。</p>
				<div>
				<div class="botton">
					<a class="btn" href="register/signup.php">フィリアールの会員になる</a> 
				</div>
			</div>

			<div>
				<h5>
					<a href="signin.php"><font color="#8f4796"> すでに会員の方はこちらから入館</font></a>
				</h5>
			</div>	
			</div>	
		</div>	
	</div>
</div>


<!-- how to use -->
<div class="box">
	<div id="how" class="container-how">
		<div class="title">
			<h1>HOW TO USE?</h1>
		</div>
		<div class="wrap">
			<div class="element">
				<img src="assets/img/how_to_1.jpg" alt="">
				<h2>
					<font color="#8f4796">追加したい本の情報を入力</font>
				</h2>
				<div class="intro">
					<p>新規追加ボタンから「読みたい本」<br>「読んだ本」の情報を入力します。</p>
				</div>
			</div>
			<div class="element">
				<img src="assets/img/how_to_2.jpg" alt="">
				<h2>
					<font color="#8f4796">ISBNで簡単に詳細管理</font>
				</h2>
				<div class="intro">
					<p>入力が面倒・詳細情報もほしい方は<br>ISBNを入力するだけで取得できます。</p>
				</div>
			</div>
			<div class="element">
				<img src="assets/img/how_to_3.jpg" alt="">
				<h2>
					<font color="#8f4796">初めての本が追加されると…？</font>
				</h2>
				<div class="intro">
					<p>保管した本がまだ誰も保管していない本なら<br>フィリアールからメッセージが届き…？</p>
				</div>
			</div>
		</div>	
	</div>
</div>


<!-- who is he -->
<div id="who" class="container-who">
	<div class="title">
		<h1>WHO IS HE?</h1>
	</div>
	<div class="container1">
		<div class="row1">
			<img src="assets/img/big_philia.jpg" alt="pc_img">
		</div>
	

		<div class="row2">
			<h2>
				<font color="#8f4796">
					フィリアさん(♂)
				</font>
			</h2>
			<p>本フェチの館の支配人。</p>
			<p>本フェチにしか見えず、あなたが本に囲まれた<br>至福の時間を過ごすためのお手伝いをします。</p>
			<p>ここにフィリアさんの説明が入ります。ここにフィリアさんの説明が入ります。</p>
			<p>ここにフィリアさんの説明が入ります。ここにフィリアさんの説明が入ります。</p>

			<div class="botton">
				<a class="btn" href="https://twitter.com/philia_san" target="_blank">フィリアールのTwitterを覗く</a> 
			</div>	
		</div>	
	</div>	

	<div class="container2">
		<div class="row3">
			<div class="intro">
				<img src="assets/img/frame.jpg" alt="">
				<p>普段はこの姿であなたを見守ります。</p>
			</div>
			
			<div class="intro">
				<img src="assets/img/frame.jpg" alt="">
				<p>夢は自分の図書館を作ること</p>
			</div>
		</div>
	</div>

</div>	

<!-- message -->
<div id="msg" class="container-msg">
	<div class="msg">
		<h2>あなたの大好きな本をフィリアールで保管しませんか？</h2>

		<div class="botton">
			<a class="btn" href="register/signup.php">フィリアールの会員になる</a> 
		</div>	
	</div>
</div>

<!-- footer -->
<div id="footer">
	<div id="copyright">
	    <div class="container-copy"> 
	       <p>
	          &copy; 2018 T-zerg ALL RIGHTS RESERVE
	        </p>
	    </div>
	</div>
</div>


<script src="assets/js/jquery-3.1.1.js"></script>
<script src="assets/js/jquery-migrate-1.4.1.js"></script>
<script src="assets/js/bootstrap.js"></script>


</body>
</html>