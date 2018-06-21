<div id="modal-content3">

	  <div class="container-fluid pop_header2">
  	    <div class="row">
  	  	  <div class="col-xs-12 col-md-6 col-md-offset-3">
  	    	<p>　本を登録する </p>
	  	  </div>
    	</div>
  	  </div>

  	  <div class="container" style="margin-bottom: 50px;">
		<div class="row">
  	  	  <div class="col-xs-12 col-md-6 col-md-offset-3">
  	  	    <div class="book_img2">
  	  	  	  <img class="book_pic2" src="https://placehold.jp/b96cc4/ffffff/210x296.png?text=NO IMAGE" width="148">
  	  	    </div>
  	  	  </div>
    	</div><!-- row -->

		<div class="row">
  	  	  <div class="col-xs-12 col-md-6 col-md-offset-3">
  	  	  	<div class="new_book">


  	  	  		<form action="pop_pages/future_add_check.php" method="post">
  	  	  			<div>
                       
                        <input type="file" name="book_img" id="img_name" accept="image/*" placeholder="画像" class="new_book_img">
                    </div>

			  <div>
			    <!-- <label for="book_title">作品名</label> -->
			    <input type="text" id="book_isbn" name="future_isbn" placeholder="  ISBNコード">
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
			  	<button type="submit" name="" class="book_add_btn2">検索する</button>
			  </div>

			</form>

			</div>
		  </div>
    	</div><!-- row -->
      </div><!-- container -->

	</div>

	<div id="modal-content4">
	  <div class="container-fluid pop_header">
  	    <div class="row">
  	  	  <div class="col-xs-12 col-md-12">
  	    	<p>登録本の確認</p>
	  	  </div>
    	</div>
  	  </div>

  	  <div class="container" style="margin-bottom: 50px;">
		<div class="row">
  	  	  <div class="col-xs-12 col-md-6 col-md-offset-3">
  	  	    <div class="book_img3">
  	  	  	  <img class="book_pic3" src="https://placehold.jp/b96cc4/ffffff/210x296.png?text=NO IMAGE" width="148">
  	  	    </div>
  	  	  </div>
    	</div><!-- row -->
    	<div class="pop_p">
  	  	  <p>この内容で間違いありませんか？</p>
  	  	</div>

		<div class="row">
  	  	  <div class="col-xs-12 col-md-6 col-md-offset-3 form_info">
			<form action="mypage2.php?future_isbn=<?php echo $future_isbn; ?>" method="post" class="form_original_2">
			  <div>
			    <textarea name="future_book"><?php echo $future_book; ?></textarea>
			  </div>
			  <div>
			    <textarea name="future_author"><?php echo $future_author; ?></textarea>
			  </div>
			  <div>
			    <textarea id="book_story" name="future_story" placeholder="  ここに解説文が入ります" readonly><?php echo $future_comment ?></textarea>
			  </div>
			  <div>
			  	<button type="submit" name="" class="book_add_btn">保管する</button>
			  </div>
			</form>
		  </div>
    	</div><!-- row -->
      </div><!-- container -->
	</div>