<div id="modal-content">

	  <div class="container-fluid pop_header2">
  	    <div class="row">
  	  	  <div class="col-xs-12 col-md-12">
  	    	<p>　本を登録する </p>
	  	  </div>
    	</div>
  	  </div>

  	  <div class="container" style="margin-bottom: 30px;">
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

<form action="pop_pages/past_add_book.php" method="post">

  	  	  			<div>
                       
                        <input type="file" name="book_img" id="img_name" accept="image/*" placeholder="画像" class="new_book_img">
                    </div>

			  <div>
			    <!-- <label for="book_title">作品名</label> -->
			    <input type="text" id="past_isbn" name="past_isbn" placeholder="  ISBN">
			  </div>
			  <div>
			    <!-- <label for="book_title">作品名</label> -->
			    <input type="text" id="past_book" name="past_book" placeholder="  著者">
			  </div>
			  <div>
			    <!-- <label for="book_story">解説文</label> -->
			    <textarea id="past_story" name="past_story" placeholder="  解説文（54文字まで)"></textarea>
			  </div>

			  <div>
			  	<button type="submit" name="" class="book_add_btn">検索する</button>
			  </div>
			  </form>

			  <div class="spread">
			  	<a class="sheet" href="absorb/submit_2.php">スプレッドシートですでに管理してる方はこちら</a>
			  </div>
			</div>
		  </div>
    	</div><!-- row -->
      </div><!-- container -->

	</div>

	<div id="modal-content2">
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
			<form action="mypage2.php?past_isbn=<?php echo $past_isbn; ?>" method="POST" class="form_original_2">
			  <div>
			    <textarea name="past_book"><?php echo $past_book; ?></textarea>
			  </div>
			  <div>
			    <textarea name="past_author"><?php echo $past_author; ?></textarea>
			  </div>
			  <div>
			    <textarea id="book_story" name="book_story" placeholder="  ここに解説文が入ります" readonly><?php echo $past_comment; ?></textarea>
			  </div>
			  <div>
			  	<button type="submit" name="" class="book_add_btn">保管する</button>
			  </div>
			</form>
		  </div>
    	</div><!-- row -->
      </div><!-- container -->
	</div>