<?php foreach ($future_books as $future) : ?>

<!-- pop -->
<div id="modal-content-future-modal-open-future<?php echo $future["id"]; ?>" class="modal-content-future">

        <div class="container-fluid pop_header" style="background-color: white;">
           <div class="row">
              <div class="col-xs-12 col-md-12">
                  <a id="modal-close-future" class="button-link modal-close-future">×</a>
              </div>
            </div>
        </div>

        <div class="container" style="padding-left: 0">
            <div class="row">
                <div class="col-xs-12 col-md-6 col-md-offset-3">
                   <div class="book_img">
                    <?php if ($future["book_img"] != '') : ?>
                        <img src="book_img/<?php echo $future["book_img"]; ?>" class="book_pic">
                    <?php else : ?>
                        <img src="assets/img/philia2.png" alt="no image" class="book_pic">
                    <?php endif; ?>
                   </div>
                 </div>
            </div><!-- row -->

            <div class="row">
                <div class="col-xs-12 col-md-6 col-md-offset-3">
                    <form action="future_edit.php?id=<?php echo $future['id'];?>" method="post" enctype="multipart/form-data" class="form_original">
                        <div>
                            <label for="book_img">画像</label>
                            <input type="file" name="book_img" id="img_name" accept="image/*" >
                        </div>

　                       <div>
                            <label for="book_title">本のタイトル</label>
                            <textarea name="book_title"><?php echo $future['book_title']; ?></textarea>
                        </div>

                        <div>
                            <label for="book_author">著者</label>
                            <textarea name="book_author"><?php echo $future['book_author']; ?></textarea>
                        </div>

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
                        <a onClick="return confirm('この本をリストから削除しますか？');" href="future_delete.php?id=<?php echo $future['id'];?>" class="book_del_btn"><button type="submit" name="" class="book_delete_btn">削除する</button>
                        </a>
                    </div>
               </div>
            </div><!-- row -->
        </div>
</div><!-- modal-content-future -->


<a id="modal-open-future<?php echo $future["id"]; ?>" class="button-link modal-open-future">
    <div class="col-xs-6 col-md-3">
        <?php if ($future["book_img"] != '') : ?>

            <div class="l-thumbnail">
                <figure class="thumbnail-wrapper">
                    <img src="book_img/<?php echo $future["book_img"]; ?>">
                </figure>
                <span class="more-text">
                   <p>タイトル:<?php echo $future['book_title']; ?></p>
                   <p>作者:<?php echo $future['book_author']; ?></p>
                </span>
            </div>
        <?php else : ?>
            <div class="l-thumbnail">
                <figure class="thumbnail-wrapper">
                    <img src="assets/img/philia2.png" alt="no image">
                </figure>
                <span class="more-text">
                    <p>タイトル:<?php echo $future['book_title']; ?></p>
                    <p>作者:<?php echo $future['book_author']; ?></p>
                </span>
            </div>
        <?php endif; ?>
    </div>
</a>
<?php endforeach; ?>