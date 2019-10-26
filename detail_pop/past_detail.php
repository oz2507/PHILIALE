<?php foreach ($past_books as $past) : ?>

<!-- pop -->
<div id="modal-content-past-modal-open-past<?php echo $past['id']; ?>" class="modal-content-past">

    <div class="container-fluid pop_header" style="background-color: white;">
        <div class="row">
            <div class="col-xs-12 col-md-12">
                <a id="modal-close-past" class="button-link modal-close-past">×</a>
            </div>
        </div>
    </div>

    <div class="container" style="padding-left: 0">
        <div class="row">
            <div class="col-xs-12 col-md-6 col-md-offset-3">
                <div class="book_img">
                    <?php if ($past["book_img"] != '') : ?>
                        <img src="book_img/<?php echo $past["book_img"]; ?>" class="book_pic">
                    <?php else : ?>
                        <img src="assets/img/philia2.png" alt="no image" class="book_pic">
                    <?php endif; ?>
               </div>
            </div>
        </div><!-- row -->

        <div class="row">
            <div class="col-xs-12 col-md-6 col-md-offset-3">
                <form action="past_edit.php?id=<?php echo $past['id'];?>" method="post" class="form_original" enctype="multipart/form-data">

                    <div>
                        <label for="book_img">画像</label>
                        <input type="file" name="book_img" id="img_name" accept="image/*" >
                    </div>

                    <div>
                        <label for="book_title">タイトル</label>
                        <textarea name="book_title"><?php echo $past['book_title']; ?></textarea>
                    </div>

                    <div>
                        <label for="book_author">著者</label>
                        <textarea name="book_author"><?php echo $past['book_author']; ?></textarea>
                    </div>

                    <div>
                        <label for="book_story">解説文</label>
                        <textarea id="book_story" name="comment"><?php echo $past['comment']; ?></textarea>
                    </div>

                    <div>
                        <button type="submit" name="" class="book_add_btn">更新する</button>
                    </div>
                </form>

                <div>
                    <a onClick="return confirm('この本をリストから削除しますか？');" href="past_delete.php?id=<?php echo $past['id'];?>" class="book_del_btn">
                        <button type="submit" name="" class=" book_delete_btn">削除する</button>
                    </a>
                </div>
            </div>
        </div><!-- row -->
    </div>
</div><!-- modal-content-past -->

<a id="modal-open-past<?php echo $past['id']; ?>" class="button-link modal-open-past">
    <div class="col-xs-6 col-md-3">
        <?php if ($past["book_img"] != '') : ?>
            <div class="l-thumbnail">
                <figure class="thumbnail-wrapper">
                    <img src="book_img/<?php echo $past["book_img"]; ?>">
                </figure>
                <span class="more-text">
                    <p>タイトル:<?php echo $past['book_title']; ?></p>
                    <p>作者:<?php echo $past['book_author']; ?></p>
                </span>
            </div>
        <?php else : ?>
            <div class="l-thumbnail">
                <figure class="thumbnail-wrapper">
                    <img src="assets/img/philia2.png" alt="no image">
                </figure>
                <span class="more-text">
                    <p>タイトル:<?php echo $past['book_title']; ?></p>
                    <p>作者:<?php echo $past['book_author']; ?></p>
                </span>
            </div>
        <?php endif; ?>
    </div>
</a>

<?php endforeach; ?>