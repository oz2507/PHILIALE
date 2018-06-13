<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>library</title>

	<?php require('partial/css_link.php'); ?>
    <link rel="shortcut icon" href="assets/img/favicon/favicon.ico" type="image/vnd.microsoft.icon">
    <link rel="icon" href="assets/img/favicon/favicon.ico" type="image/vnd.microsoft.icon">
</head>
<body>

	<!-- 2.navbar -->
	<!-- 2.searchbar -->
	<!-- 2.add new -->
	<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <!-- <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbarEexample">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button> 
 -->
            <a class="navbar-brand" href="../../T-zergコピー/index2.html">
                <img alt="phifia" src="assets/img/philia1.png" style="height: 20px;">
            </a>           
        </div>

        <!-- <div class="collapse navbar-collapse" id="navbarEexample"> -->
        <form class="navbar-form navbar-right" role="search">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="文庫検索">
                </div>
                <button type="submit" class="btn btn-default">検索</button>
            </form>

            
        <!-- </div> -->

    </nav>


	<!-- 4.book-col -->
	<?php require('partial/book-col.php'); ?>

	<!-- 5.footer -->
	<?php require('partial/footer.php'); ?>

	<!-- 6.js -->
	<script src="assets/js/jquery-3.1.1.js"></script>
	<script src="assets/js/jquery-migrate-1.4.1.js"></script>
	<script src="assets/js/bootstrap.js"></script>

	
</body>
</html>