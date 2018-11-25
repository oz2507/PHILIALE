<?php 

session_start();
require('dbconnect.php');

$errors = array();

if (!empty($_POST)) {
    $name     = $_POST['input_name'];
    $email    = $_POST['input_email'];
    $password = $_POST['input_password'];

    $count = strlen($password);

    if ($name == '') {
        $errors['name'] = 'blank';
    }

    if ($email == '') {
        $errors['email'] = 'blank';
    }

    if ($password == '') {
        $errors['password'] = 'blank';

    }elseif ($count < 4 || $count > 16) {
        $errors['password'] = 'length';
    }

    if ($name !== '' && $email !== '' && $password !== '') {
        $sql  = 'SELECT * FROM `users` WHERE `email` = ?';
        $data = array($email);
        $stmt = $dbh->prepare($sql);
        $stmt->execute($data);

        $record = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($record == false) {
            $errors['signin'] = 'failed';
        } else {

            if (password_verify($password,$record['password'])){
                $_SESSION['id'] = $record['id'];

                header("Location: mypage2.php");
                exit();
            }else{
                $errors['signin'] = 'failed';
            }
        }
    }
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">

	<title>PHILIALE</title>

	<!-- signin -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="icon" href="assets/img/favicon/favicon.ico" type="image/vnd.microsoft.icon">
	<link rel="shortcut icon" href="assets/img/favicon/favicon.ico" type="image/vnd.microsoft.icon">
	<link rel="stylesheet" href="assets/css/signin_pop.css">
	<link rel="stylesheet" type="text/css" href="assets/css/style_r.css">
	<!-- top -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/top2.css">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed:700">
	<link rel="shortcut icon" href="assets/img/favicon/favicon.ico" type="image/vnd.microsoft.icon">
	<link rel="icon" href="assets/img/favicon/favicon.ico" type="image/vnd.microsoft.icon">


</head>
<body style="margin: 0px; margin-top: 50px;">
  <div id="wrapper">
	  <!-- navbar -->
	  <nav class="navbar navbar-default navbar-fixed-top">
	    <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarExample">
	          <span class="sr-only">Toggle navigation</span>
	          <span class="icon-bar"></span>
	          <span class="icon-bar"></span>
	          <span class="icon-bar"></span>
	        </button> 

	        <a class="navbar-brand" href="#top">
	          <i class="fas fa-book-open fa-2x"><span>PHILIALE</span></i>
	        </a>           
	      </div>

        <div class="collapse navbar-collapse navbar-right" id="navbarExample">
          <ul class="nav navbar-nav">
            <li><a href="register/signup.php">新規登録</a></li>
            <li class="right diviver">|</li>
            <li><a href="#" class="modal-signin">ログイン</a></li>
          </ul>
	  		</div>
	    </div>
	  </nav>

	<?php include("signin_pop.php"); ?>

	<!-- header -->
	<div class="container-head">
		<div class="row">
			<div class="col-xs-12 col-md-12">
				<img src="assets/img/gif/フィリア.gif" alt="head-design" class="head-img" style="width: 100%;">	
			</div>
		</div>
	</div>

	<!-- what's philiale -->
	<div id="what" class="container">
		<div class="row">
			<div class="title">
				<h1>WHAT'S PHILILALE?</h1>
			</div>
			<!-- left -->
			<div class="col-xs-12 col-md-6 half-col_1">
				<h3>読書フェチのためのWeb上の書庫です。</h3>
				  <p>フィリアールは<font color="#8f4796">読み終わった本や読みたい本を保管するため</font>の<br>あなた専用のWeb上の書庫です。</p>
				  <p>フィリアールで本を保管しておけば、<font color="#8f4796">あなたに代わって本の詳細を記載して</font><br>いつでも引き出せるように本を管理することができます。</p>
				  <p>利用方法はとてもシンプルで、<font color="#8f4796">本のタイトルを入力する</font>だけ。</p>
				  <p>フィリアールはあなたの<font color="#8f4796">愛する本を簡単にそして美しく</font>管理することができます。</p>
			    <div class="botton">
				    <a class="btn" href="register/signup.php">フィリアールの会員になる</a> 
				  </div>
				<div>
					<h5><a href="signin.php">会員の方はこちらから入館</a></h5>
		    </div>
			</div>

			<!-- right -->
			<div class="col-xs-12 col-md-6 half-col_2">
				<img src="assets/img/phone.png" alt="phone_img" class="pc_only">	
			</div>
		</div>
	</div>

	<div class="box"></div>

	<!-- how to use -->
	<div id="how" class="container">
		<div class="row">
			<div class="title">
				<h1>HOW TO USE?</h1>
			</div>
		  <div class="col-xs-12 col-md-4">
				<img src="assets/img/how/how1.png" alt="">
				<h2><font color="#8f4796">追加したい本の情報を入力</font></h2>
			  <div class="intro">
				  <p>新規追加ボタンから「読みたい本」<br>「読んだ本」の情報を入力します。</p>
			  </div>
		  </div>

			<div class="col-xs-12 col-md-4">
				<img src="assets/img/how/how2.png" alt="">
				<h2>
					<font color="#8f4796">ISBNで簡単に詳細管理</font>
				</h2>
				<div class="intro">
					<p>入力が面倒・詳細情報もほしい方は<br>ISBNを入力するだけで取得できます。</p>
				</div>
			</div>

			<div class="col-xs-12 col-md-4">
				<img src="assets/img/how/how3.png" alt="">
				<h2>
					<font color="#8f4796">初めての本が追加されると…？</font>
				</h2>
				<div class="intro">
					<p>保管した本がまだ誰も保管していない本なら<br>フィリアールからメッセージが届き…？</p>
				</div>
			</div>
		</div>	
	</div>

	<div class="box"></div>

	<!-- who is he -->
	<div id="who" class="container">
		<div class="row">
			<div class="title">
				<h1>WHO IS HE?</h1>
			</div>
			<div class="col-xs-12 col-md-5">
				<img src="assets/img/how/philia_1.png" alt="pc_img">
			</div>

			<div class="col-xs-12 col-md-7">
				<h2>
					<font color="#8f4796">
						フィリアさん(♂)
					</font>
				</h2>
				<p>お初にお目に掛かります。</p>
				<p>私は、PHILIALE(フィリアール)の支配人、そして本好きなただの猫でございます。</p>
				<p>あなたが本に囲まれた至福の時間を過ごすためのお手伝いをします。</p>
				<p>フィリア(友愛)を持つ全ての方に私はお仕え致します。</p>

				<div class="botton">
					<a class="btn" href="https://twitter.com/philia_san" target="_blank">フィリアールのTwitterを覗く</a> 
				</div>			
			</div>
		</div>
	</div>

	<!-- message -->
	<div  id="msg" class="container">
		<div class="row">
			<div class="col-xs-12 col-md-12">
				<h2>
					あなたの大好きな本をフィリアールで保管しませんか？
				</h2>
				<div class="button">
					<a class="btn" href="register/signup.php">
					フィリアールの会員になる
					</a> 
				</div>
				<div class="contact">
					<a href="Form/contact.php">
						お問い合わせはこちらから
					</a>
				</div>			
			</div>
		</div>
	</div>

	<!-- footer -->
	<div id="copy" class="container">
		<div class="row">
			<div class="col-xs-12 col-md-12">
		    	<a href="Form/terms.php"> 
			       <p>
			          &copy; 2018 T-zerg ALL RIGHTS RESERVE
			        </p>
			    </a>
			</div>		
		</div>	
	</div>
</div>


<script src="assets/js/jquery-3.1.1.js"></script>
<script src="assets/js/jquery-migrate-1.4.1.js"></script>
<script src="assets/js/bootstrap.js"></script>
<script src="assets/js/signin.js"></script>
</body>
</html>