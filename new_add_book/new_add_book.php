<?php 


?>


<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>PHILIALE</title>
  <link rel="stylesheet" type="text/css" href="new_add_book/new_add_book.css">
  <link rel="stylesheet" type="text/css" href="new_add_book/new_add_book_pop.css">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"><!-- グリッドシステムのみ -->
</head>

<body>

	<div id="modal-content">

	  <div class="container-fluid pop_header">
  	    <div class="row">
  	  	  <div class="col-xs-12 col-md-12">
  	    	<p>　本を登録する </p>
	  	  </div>
    	</div>
  	  </div>

  	  <div class="container" style="margin-bottom: 50px;">
		<div class="row">
  	  	  <div class="col-xs-12 col-md-6 col-md-offset-3">
  	  	    <div class="book_img">
  	  	  	  <img class="book_pic" src="https://placehold.jp/b96cc4/ffffff/210x296.png?text=NO IMAGE" width="148">
  	  	    </div>
  	  	  </div>
  	  	  <div class="col-xs-12 add_img">
  	  	    <a href="#"><button type="submit" name="" class="add_img_btn">画像を登録</button></a>
  	  	  </div>
    	</div><!-- row -->

		<div class="row">
  	  	  <div class="col-xs-12 col-md-6 col-md-offset-3">
			<form action="check_add_book.php" method="post" class="form_original_2">
			  <div>
			    <!-- <label for="book_title">作品名</label> -->
			    <input type="text" id="book_isbn" name="book_isbn" placeholder="  ISBNコード">
			  </div>
			  <div>
			    <!-- <label for="book_title">作品名</label> -->
			    <input type="text" id="book_title" name="book_title" placeholder="  本のタイトル">
			  </div>
			  <div>
			    <!-- <label for="book_story">解説文</label> -->
			    <textarea id="book_story" name="book_story" placeholder="  解説文（54文字まで)"></textarea>
			  </div>
			  <div>
			  	<!-- <button type="submit" name="" class="book_add_btn">検索する</button> -->
			  	<?php include('check_add_book.php'); ?>
			  </div>
			</form>
		  </div>
    	</div><!-- row -->
      </div><!-- container -->


	</div>

	<!-- <p><a id="modal-open" class="button-link">クリックするとモーダルウィンドウを開きます。</a></p>
 -->

	<a id="modal-open" class="button-link">
		<div class="col-xs-6 col-md-3">
            <div class="thumbnail">
                <img src="assets/img/add.png">
            </div>
         </div>

	</a>

	<script src="assets/js/jquery-3.1.1.js"></script>
	<script src="new_add_book/new_add_book.js"></script>

</body>
</html>

