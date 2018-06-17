<?php

    session_start();
    require("dbconnect.php");

    $books=array();

    if (isset($_GET["search_word"])==true) {
        $books_sql='SELECT * FROM `library_archives` 
                    WHERE book_title LIKE "%'.$_GET['search_word'].'%" OR book_author LIKE "%'.$_GET['search_word'].'%"';
    }else{
        $books_sql='SELECT * FROM `library_archives`';
    }

    $data=array();
    $stmt = $dbh->prepare($books_sql);
    $stmt->execute($data);
    
    while (true) {
        $record=$stmt->fetch(PDO::FETCH_ASSOC);

        if ($record==false) {
            break;
        }

        $books[]=$record;
       
        }

?>

<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="UTF-8">
    <!-- <meta name="viewport" content="target-densitydpi=device-dpi, width=device-width, maximum-scale=1.0, user-scalable=yes"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>PHILIBLARY</title>

    <link rel="stylesheet" type="text/css" href="detail_pop/detail.css">
    <link rel="stylesheet" type="text/css" href="detail_pop/detail_pop.css">

	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.phl.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed:700">
  
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

            <a class="navbar-brand-center" style="position: absolute;top:10px;z-index:2000;"  href="mypage2.php">
                <img alt="philia" src="assets/img/philia2.png" style="height: 35px;">
            </a>       
        
        </div>

        <div class="collapse navbar-collapse" id="navbarExample">
            <ul id="title" class="nav navbar-nav nab-tabs">
            	<li><a href="#top">PHILIBRARY</a></li>	
            </ul>

          	<form class="navbar-form navbar-right" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="文庫検索" name="search_word">
                </div>
                <button type="submit" class="btn btn-default">検索</button>
            </form>

  		</div>
    </div>
</nav>



<!-- book -->
<div class="container">
    <div class="row">
         <?php include('detail_pop/library_detail.php'); ?>
    </div>
</div>





<!-- 5.footer -->
	<?php require('partial/footer.php'); ?>

<!-- 6.js -->
<script src="assets/js/jquery-3.1.1.js"></script>
<script src="detail_pop/library_detail.js"></script>

<script src="assets/js/jquery-migrate-1.4.1.js"></script>
<script src="assets/js/bootstrap.js"></script>

</body>
</html>
