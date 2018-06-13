<?php foreach ($future_books as $future) { ?>
	<a id="modal-open<?php echo $past["id"]; ?>" class="button-link modal-open">	
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