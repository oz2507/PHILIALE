<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>PHILIBLARY</title>

	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
	<link rel="stylesheet" href="assets/css/mypage.css">
</head>
<body>
<!-- navbar -->
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarEexample">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button> 

            <a class="navbar-brand-center" style="position: absolute;top:10px;z-index:2000;"  href="#">
                <img alt="philia" src="assets/img/philia2.png" style="height: 35px;">
            </a>       
        
        </div>

        <div class="collapse navbar-collapse" id="navbarEexample">
            <ul class="nav navbar-nav">
            	<li><a href="#">PHILIBRARY</a></li>
            	
            </ul>

          	<form class="navbar-form navbar-right" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="文庫検索">
                </div>
                <button type="submit" class="btn btn-default">検索</button>
            </form>

  		</div>
    </div>
</nav>

<!-- book -->
<div class="row">
	<div class="col-xs-6 col-md-3">
		<div class="thumbnail">
			<img src="assets/img/philia2.png">
			<div class="caption">
				<h3>サムネイル・ラベル</h3>
				<p>段落。</p>
				<p>...</p>
				<p><a href="#" class="btn btn-default" role="button" target="_blank">ボタン</a></p>
			</div>
		</div>
	</div>
</div>


<!-- 5.footer -->
	<?php require('partial/footer.php'); ?>

<!-- 6.js -->
<script src="assets/js/jquery-3.1.1.js"></script>
<script src="assets/js/jquery-migrate-1.4.1.js"></script>
<script src="assets/js/bootstrap.js"></script>

</body>
</html>