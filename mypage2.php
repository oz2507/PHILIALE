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
        		   WHERE book_title like "%'.$_GET['search_word'].'%" AND user_id=?';
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
		$future_sql='SELECT * FROM `future_archives` WHERE user_id=? and book_title like "%'.$_GET['search_word'].'%"';
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



?>

<!-- <?php var_dump($past_books); ?>
<?php var_dump($future_books); ?>
<?php var_dump($_GET); ?>
<?php echo $past_books["book_img"]; ?>
<?php echo $past_sql; ?>
<?php echo $future_sql; ?>
 -->

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
	<title>MYPAGE</title>

	<link rel="stylesheet" type="text/css" href="detail_pop/detail.css">
  	<link rel="stylesheet" type="text/css" href="detail_pop/detail_pop.css">

	<link rel="stylesheet" href="assets/css/bootstrap.phl.css">
	<link rel="stylesheet" href="assets/css/style.css">
	<link rel="stylesheet" href="assets/css/mypage.css">
	
</head>
<body style="margin-top: 90px;background-image: url(assets/img/back.jpg);">
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

            <a class="navbar-brand-center" style="position: absolute;top:10px;z-index:2000;"  href="library2.php">
                <img alt="philia" src="assets/img/philia2.png" style="height: 35px;">
            </a>       
        
        </div>

        <div class="collapse navbar-collapse" id="navbarEexample">
            <ul class="nav navbar-nav nav-tabs">
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


<!-- pop -->
<div id="modal-content">

	<div class="container-fluid pop_header" style="background-color: white;">
	    <div class="row">
	      <div class="col-xs-12 col-md-12">
			<a id="modal-close" class="button-link">×</a>
	  </div>
	</div>
	</div>

	<div class="container">
	<div class="row">
	  	  <div class="col-xs-12 col-md-6 col-md-offset-3">
	  	    <div class="book_img">
	  	  	<img class="book_pic" src="https://placehold.jp/b96cc4/ffffff/210x296.png?text=NO IMAGE" width="148">
	  	    </div>
	  	  </div>
	</div><!-- row -->

	<div class="row">
		  <div class="col-xs-12 col-md-6 col-md-offset-3">
		<form action="" method="" class="form_original">
			<div>
			  <label for="book_title">作品名</label>
			  <input type="text" id="book_title" name="book_title">
			</div>
			<div>
			  <label for="book_author">著者</label>
			  <input type="text" id="book_author" name="book_author">
			</div>
			<div>
			  <label for="book_publisher">出版社</label>
			  <input type="text" id="book_publisher" name="book_publisher">
			</div>
			<div>
			  <label for="book_story">解説文</label>
			  <textarea id="book_story" name="book_story"></textarea>
			</div>
			<div>
			 <button type="submit" name="" class="book_add_btn">更新する</button>
			</div>
				<div>
			 <a onClick="return confirm('この本をリストから削除しますか？');" href="#" class="book_del_btn">削除する</a>
			</div>
		</form>
	  </div>
	</div><!-- row -->
	</div>

</div>

<!-- 読みたい -->
<div class="tab-content">
    
    <div id="tab1" class="tab-pane fade in active">
		<!-- add book -->
		<div class="container">
			<div class="row">

		        <div class="col-xs-6 col-md-3"> 
		            <div class="l-thumbnail">
        			    <figure class="thumbnail-wrapper">
               				<img src="assets/img/add.png">
             			</figure>
		                <span class="more-text">
		                    ADDITION
		                </span>
        			</div>
     			</div>
     			<div class="col-xs-6 col-md-3"> 
		            <div class="l-thumbnail">
        			    <figure class="thumbnail-wrapper">
               				<img src="assets/img/empelar.jpg">
             			</figure>
		                <span class="more-text">
		                    DETAIL
		                </span>
        			</div>
     			</div>
     			<div class="col-xs-6 col-md-3"> 
		            <div class="l-thumbnail">
        			    <figure class="thumbnail-wrapper">
               				<img src="assets/img/harmony.jpg">
             			</figure>
		                <span class="more-text">
		                    DETAIL
		                </span>
        			</div>
     			</div>
     			<div class="col-xs-6 col-md-3"> 
		            <div class="l-thumbnail">
        			    <figure class="thumbnail-wrapper">
               				<img src="assets/img/jenoside.jpg">
             			</figure>
		                <span class="more-text">
		                    DETAIL
		                </span>
        			</div>
     			</div>
     			<div class="col-xs-6 col-md-3"> 
		            <div class="l-thumbnail">
        			    <figure class="thumbnail-wrapper">
               				<img src="assets/img/book1.jpg">
             			</figure>
		                <span class="more-text">
		                    DETAIL
		                </span>
        			</div>
     			</div>

				 <?php include("detail_pop/future_detail.php"); ?>
				
			</div>
		</div>
	</div>

	<!-- 読んだ -->
	<div id="tab2" class="tab-pane fade">
		<div class="container">
			<div class="row">

				<div class="col-xs-6 col-md-3"> 
		            <div class="l-thumbnail">
        			    <figure class="thumbnail-wrapper">
               				<img src="assets/img/add.png">
             			</figure>
		                <span class="more-text">
		                    ADDITION
		                </span>
        			</div>
     			</div>
     			<div class="col-xs-6 col-md-3"> 
		            <div class="l-thumbnail">
        			    <figure class="thumbnail-wrapper">
               				<img src="assets/img/harmony.jpg">
             			</figure>
		                <span class="more-text">
		                    DETAIL
		                </span>
        			</div>
     			</div>
     			<div class="col-xs-6 col-md-3"> 
		            <div class="l-thumbnail">
        			    <figure class="thumbnail-wrapper">
               				<img src="assets/img/harmony.jpg">
             			</figure>
		                <span class="more-text">
		                    DETAIL
		                </span>
        			</div>
     			</div>
     			<div class="col-xs-6 col-md-3"> 
		            <div class="l-thumbnail">
        			    <figure class="thumbnail-wrapper">
               				<img src="assets/img/harmony.jpg">
             			</figure>
		                <span class="more-text">
		                    DETAIL
		                </span>
        			</div>
     			</div>
     			<div class="col-xs-6 col-md-3"> 
		            <div class="l-thumbnail">
        			    <figure class="thumbnail-wrapper">
               				<img src="assets/img/harmony.jpg">
             			</figure>
		                <span class="more-text">
		                    DETAIL
		                </span>
        			</div>
     			</div>
     			<div class="col-xs-6 col-md-3"> 
		            <div class="l-thumbnail">
        			    <figure class="thumbnail-wrapper">
               				<img src="assets/img/harmony.jpg">
             			</figure>
		                <span class="more-text">
		                    DETAIL
		                </span>
        			</div>
     			</div>

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

<script src="assets/js/jquery-migrate-1.4.1.js"></script>
<script src="assets/js/bootstrap.js"></script>

</body>
</html>