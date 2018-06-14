<?php foreach ($past_books as $past) { ?>

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
	  	  	<?php if ($past["book_img"]!='') {?>
                        <img src="book_img/<?php echo $past["book_img"]; ?>">
                    <?php }else{ ?>
                        <img src="assets/img/philia2.png" alt="no image">
                    <?php } ?>
	  	    </div>
	  	  </div>
	</div><!-- row -->

	<div class="row">
		  <div class="col-xs-12 col-md-6 col-md-offset-3">
		<form action="past_edit.php" method="post" class="form_original">
			<div>
			  <label for="book_title"><?php echo $past['book_title']; ?></label>
			  <input type="text" id="book_title" name="book_title">
			</div>
			<div>
			  <label for="book_author"><?php echo $past['book_author']; ?></label>
			  <input type="text" id="book_author" name="book_author">
			</div>
			<!-- <div>
			  <label for="book_publisher">出版社</label>
			  <input type="text" id="book_publisher" name="book_publisher">
			</div> -->
			<div>
			  <label for="book_story">解説文</label>
			  <textarea id="book_story" name="comment"></textarea>
			</div>
			<div>
			 <button type="submit" name="" class="book_add_btn">更新する</button>
			</div>
				<div>
			 <a onClick="return confirm('この本をリストから削除しますか？');" href="past_delete.php?id=<?php echo $past['id'];?>" class="book_del_btn">削除する</a>
			</div>
		</form>
	  </div>
	</div><!-- row -->
	</div>

</div>

	<a id="modal-open<?php echo $past["id"]; ?>" class="button-link modal-open">	
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