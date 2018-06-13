<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>PHILIALE</title>
  <link rel="stylesheet" type="text/css" href="detail_pop/detail.css">
  <link rel="stylesheet" type="text/css" href="detail_pop/detail_pop.css">
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css"><!-- グリッドシステムのみ -->
</head>

<body>

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

<?php foreach ($past_books as $past) { ?>
	<a id="modal-open" class="button-link">	
		<div class="col-xs-6 col-md-3">
			<?php if ($past["book_img"] != '') {?> 
	            <div class="l-thumbnail">
    			    <figure class="thumbnail-wrapper">
    			    	<img src="book_img/<?php echo $past["book_img"]; ?>">
           			</figure>
    			</div>
    		<?php }else{ ?>
    			<div class="l-thumbnail">
    			    <figure class="thumbnail-wrapper">
    			    	<img src="assets/img/philia2.png" alt="no image">
					</figure>
	            </div>    			
	        <?php } ?>
     	</div>
    </a>
<?php } ?>
		
		



	<script src="assets/js/jquery-3.1.1.js"></script>
	<script src="detail_pop/detail.js"></script>

</body>
</html>


