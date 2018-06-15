<?php foreach ($future_books as $future) { ?>

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
	  	  	<?php if ($future["book_img"]!='') {?>
                        <img src="book_img/<?php echo $future["book_img"]; ?>">
                    <?php }else{ ?>
                        <img src="assets/img/philia2.png" alt="no image">
                    <?php } ?>
	  	    </div>
	  	  </div>
	</div><!-- row -->

	<div class="row">
		  <div class="col-xs-12 col-md-6 col-md-offset-3">
		<form action="future_edit.php?id=<?php echo $future['id'] ?>" method="post" class="form_original">

			<div>
			  <label for="book_img"></label>
			  <input type="file" name="book_img" id="img_name" accept="image/*">
			</div>

			<div>
			  <label for="book_title">本のタイトル</label>
			  <textarea name="book_title"><?php echo $future['book_title']; ?></textarea>
			  <!-- <input type="text" id="book_title" name="book_title"> -->
			</div>

			<div>
			  <label for="book_author">著者</label>
			  <textarea name="book_author"><?php echo $future['book_author']; ?></textarea>
			  <!-- <input type="text" id="book_author" name="book_author"> -->
			</div>
			<!-- <div>
			  <label for="book_publisher">出版社</label>
			  <input type="text" id="book_publisher" name="book_publisher">
			</div> -->
			<div>
			  <label for="book_story">解説文</label>
			  <textarea id="book_story" name="comment"><?php echo $future['comment']; ?></textarea>
			</div>

			<div>
			 <button type="submit" name="" class="book_add_btn">更新する</button>
			</div>

		</form>

		<div>
			<a href="movement.php?id=<?php echo $future['id'];?>">
			 <button type="submit" name="" class=" book_past_btn">読んだへ追加</button>
			</a>
		</div>

			<div>
				<a onClick="return confirm('この本をリストから削除しますか？');" href="future_delete.php?id=<?php echo $future['id'];?>" class="book_del_btn"><button type="submit" name="" class="book_delete_btn">削除する</button></a>
			
			</div>
	  </div>
	</div><!-- row -->
	</div>

</div>


	<a id="modal-open<?php echo $future["id"]; ?>" class="button-link modal-open">	
	<div class="col-xs-6 col-md-3"> 
        <div class="l-thumbnail">
		    <figure class="thumbnail-wrapper">
		    	<?php if ($future["book_img"]!='') {?>
   					<img src="book_img/<?php echo $future["book_img"]; ?>">
   					<span class="more-text">
                フェチる
            </span>
   				<?php }else{ ?>
   					<img src="assets/img/philia2.png" alt="no image">
   					<span class="more-text">
                NO IMAGE
            </span>
				<?php } ?>
 			</figure>
            
		</div>
		</div>
	</a>
<?php } ?>