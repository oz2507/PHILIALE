<?php foreach ($books as $book) { ?>
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
                    <?php if ($book["book_img"]!='') {?>
                        <img src="book_img/<?php echo $book["book_img"]; ?>">
                    <?php }else{ ?>
                        <img src="assets/img/philia2.png" alt="no image">
                    <?php } ?>            
                </div>
            </div>
        </div><!-- row -->

        <div class="row">
            <div class="col-xs-12 col-md-6 col-md-offset-3">
                <form action="" method="" class="form_original">
                    <div>
                      <label for="book_title"><?php echo $book['book_title']; ?></label>
                      <input type="text" id="book_title" name="book_title">
                    </div>
                    <div>
                      <label for="book_author"><?php echo $book['book_author']; ?></label>
                      <input type="text" id="book_author" name="book_author">
                    </div>
                </form>
          </div>
    </div><!-- row -->
  </div>
</div>


	<a id="modal-open<?php echo $book["id"]; ?>" class="button-link modal-open">	
    	<div class="col-xs-6 col-md-3"> 
          <div class="l-thumbnail">
      		    <figure class="thumbnail-wrapper">
        		    	<?php if ($book["book_img"]!='') {?>
             					<img src="book_img/<?php echo $book["book_img"]; ?>">
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