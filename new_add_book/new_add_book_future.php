<div id="modal-content-addition">

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
			  			<button type="submit" name="" class="book_add_btn2">検索する</button>
			 		</div>
			  	</form>

			  	<form action="pop_pages/future_add_check.php" method="post">
			  		<div>
			    	<!-- <label for="book_title">作品名</label> -->
			    		<input type="text" id="book_title" name="book_title" placeholder="  本のタイトル">
			  		</div>
			  	<form action="pop_pages/future_add_check.php" method="post">
					<div>
			    	<!-- <label for="book_story">解説文</label> -->
			    		<textarea id="book_story" name="book_story" placeholder="  解説文（54文字まで)"></textarea>
			 		</div>
			 	</form>

			  <div>
			  	<button type="submit" name="" class="book_add_btn2">検索する</button>
			  </div>

			</form>

			</div>
		  </div>
    	</div><!-- row -->
      </div><!-- container -->

	</div>