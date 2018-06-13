<?php foreach ($past_books as $past) { ?>
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