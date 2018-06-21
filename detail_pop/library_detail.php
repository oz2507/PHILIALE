<?php foreach ($books as $book) { ?>

<!-- pop -->
<div id="modal-content-lib">
    <div class="container-fluid pop_header" style="background-color: white;">
        <div class="row">
          <div class="col-xs-12 col-md-12">
            <a id="modal-close-lib" class="button-link">×</a>
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
                      <label for="book_title">本のタイトル</label>
                      <textarea name="book_title" readonly=""><?php echo $book['book_title']; ?></textarea>
                    </div>
                    <div>
                      <label for="book_author">著者</label>
                      <textarea name="book_author" readonly=""><?php echo $book['book_author']; ?></textarea>
                    </div>
                </form>
          </div>
    </div><!-- row -->
  </div>
</div>


	<a id="modal-open<?php echo $book["id"]; ?>" class="button-link modal-open-lib">	
      <div class="col-xs-6 col-md-3">
          <?php if ($book["book_img"] != '') {?> 
              <div class="l-thumbnail">
              <figure class="thumbnail-wrapper">
                <img src="book_img/<?php echo $book["book_img"]; ?>">
                </figure>
                <span class="more-text">
                      <p>タイトル:<?php echo $book['book_title']; ?></p>
                      <p>作者:<?php echo $book['book_author']; ?></p>
                  </span>
              </div>
          <?php }else{ ?>
              <div class="l-thumbnail">
                  <figure class="thumbnail-wrapper">
                      <img src="assets/img/philia2.png" alt="no image">
                  </figure>
                  <span class="more-text">
                      <p>タイトル:<?php echo $book['book_title']; ?></p>
                      <p>作者:<?php echo $book['book_author']; ?></p>
                  </span>
              </div>          
          <?php } ?>
    </div>    	
	</a>
<?php } ?>