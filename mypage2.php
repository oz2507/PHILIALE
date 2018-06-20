<?php

	session_start();
	
	require('dbconnect.php');

	if (empty($_SESSION)) {
		header("Location: top.php");
	}

	// 読んだ用
	$past_books=array();

    if (isset($_GET['search_word'])==true) {
        $past_sql='SELECT * FROM `past_archives`
        		   WHERE book_title LIKE "%'.$_GET['search_word'].'%" OR book_author LIKE "%'.$_GET['search_word'].'%" AND user_id=?';
    }else{
		$past_sql='SELECT * FROM `past_archives` WHERE user_id=?';
	}

	$past_data=array($_SESSION["id"]);
	$past_stmt = $dbh->prepare($past_sql);
	$past_stmt->execute($past_data);
	    
	while (true) {
	    $record_past=$past_stmt->fetch(PDO::FETCH_ASSOC);
	    if ($record_past==false) {
	    	break;
	    }
	    $past_books[]=$record_past;
	    }
  

	// 読みたい用
	$future_books=array();

    if (isset($_GET['search_word'])==true) {
		$future_sql='SELECT * FROM `future_archives` WHERE user_id=? AND book_title LIKE "%'.$_GET['search_word'].'%" OR book_author LIKE "%'.$_GET['search_word'].'%"';
	}else{
    	$future_sql='SELECT * FROM `future_archives` WHERE user_id=?';
	}

	$future_data=array($_SESSION["id"]);
	$future_stmt = $dbh->prepare($future_sql);
	$future_stmt->execute($future_data);
	    	
	while (true) {
	   	$record_future=$future_stmt->fetch(PDO::FETCH_ASSOC);
	    if ($record_future==false) {
	    	break;
	    }
	    $future_books[]=$record_future;
	    }

	// libraryに入れるアラートを表示させるかどうか
	// 読みたいから読んだに追加されたとき、libraryとの照合
	if(isset($_POST['isbn'])){
		// pastに入った本
		$isbn=$_POST['isbn'];

	}elseif(isset($_GET['isbn_code'])) {
		$isbn=$_GET['isbn_code'];

	}else{
		$isbn=0;
	}

	// libraryにある本
	$isbn_sql='select isbn_code from library_archives where isbn_code=?';
		
	$isbn_data=array($isbn);
	$isbn_stmt = $dbh->prepare($isbn_sql);
	$isbn_stmt->execute($isbn_data);

	$isbn_record=array();
	$isbn_record=$isbn_stmt->fetch(PDO::FETCH_ASSOC);

	if (isset($_POST['isbn']) && empty($isbn_record)) {
			// libraryでは初の本だったら、寄贈しますかのアラート
			echo '<script type="text/javascript">
				alert("図書館に寄贈しますか?");
	    		</script>';
	}elseif (isset($_GET['isbn_code']) && empty($isbn_record)){
			// libraryでは初の本だったら、寄贈しますかのアラート
			echo '<script type="text/javascript">
				alert("図書館に寄贈しますか?");
	    		</script>';
	}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<!-- <meta name="viewport" content="target-densitydpi=device-dpi, width=device-width, maximum-scale=1.0, user-scalable=yes"> -->
	<meta name="viewport" content="width=device=width">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>MYPAGE</title>

	<link rel="stylesheet" type="text/css" href="new_add_book/new_add_book.css">
  	<link rel="stylesheet" type="text/css" href="new_add_book/new_add_book_pop.css">
	<link rel="stylesheet" type="text/css" href="detail_pop/detail.css">
  	<link rel="stylesheet" type="text/css" href="detail_pop/detail_pop.css">

	<link rel="stylesheet" href="assets/css/bootstrap.phl.css">
	<link rel="stylesheet" href="assets/css/mypage.css">
	<link rel="shortcut icon" href="assets/img/favicon/favicon.ico" type="image/vnd.microsoft.icon">
	<link rel="icon" href="assets/img/favicon/favicon.ico" type="image/vnd.microsoft.icon">
</head>
<body style="margin-top: 90px;background-image: url(assets/img/back.jpg);">
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

            <a class="navbar-brand-center" style="position: absolute;top:10px;z-index:2000;"  href="library2.php">
                <img alt="philia" src="assets/img/philia2.png" style="height: 35px;">
            </a>       
        
        </div>

        <div class="collapse navbar-collapse" id="navbarExample">
            <ul class="nav navbar-nav nab-tabs">
            	<li class="active">
            	<a href="#tab1" data-toggle="tab">読みたい</a></li>
            	<li><a href="#tab2" data-toggle="tab">読んだ</a></li>
            </ul>

          	<form class="navbar-form navbar-right" role="search" method="get">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="文庫検索" name="search_word">
                </div>
                <button type="submit" class="btn btn-default">検索</button>
            </form>

  		</div>
    </div>
</nav>



<!-- 読みたい -->
<div class="tab-content">
    
    <div id="tab1" class="tab-pane fade in active">
		<!-- add book -->
		<div class="container">
			<div class="row">
		        <div class="col-xs-6 col-md-3 modal-open2"> 
		            <div class="l-thumbnail">
        			    <figure class="thumbnail-wrapper">
               				<img src="assets/img/add.png">
             			</figure>
		                <span class="more-text">
		                    ADDITION
		                </span>
        			</div>
     			</div>
     			<?php include("new_add_book/new_add_book_future.php"); ?>
     			
				 <?php include("detail_pop/future_detail.php"); ?>
				
			</div>
		</div>
	</div>

	<!-- 読んだ -->
	<div id="tab2" class="tab-pane fade">
		<div class="container">
			<div class="row">

				<!-- 新規追加 -->
				<div class="col-xs-6 col-md-3 modal-open"> 
		            <div class="l-thumbnail">
        			    <figure class="thumbnail-wrapper">
        			    	<img src="assets/img/add.png">
             			</figure>
		                <span class="more-text">
		                    ADDITION
		                </span>
        			</div>
     			</div>
     			<?php include("new_add_book/new_add_book_past.php"); ?>

     			

         		<?php include("detail_pop/past_detail.php"); ?>
			</div>
		</div>
	</div>

</div>


<!-- 5.footer -->
	<?php require('partial/footer.php'); ?>

<!-- 6.js -->

<script src="assets/js/jquery-3.1.1.js"></script>
<script src="detail_pop/past_detail.js"></script>
<script src="detail_pop/future_detail.js"></script>
<script src="new_add_book/new_add_book.js"></script>

<script src="assets/js/jquery-migrate-1.4.1.js"></script>
<script src="assets/js/bootstrap.js"></script>

</body>
</html>