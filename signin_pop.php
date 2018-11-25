<!-- <body style="margin-top: 60px" class="signin-content"> -->
  <div id="signin-content" class="container">
    <div class="row">
      <div class="col-xs-12 col-md-6 col-md-offset-3" style="height:500px;">
        <h2 class="text-center">入館する</h2>

          <div class="row">
                <div class="col-xs-12 text-center">
                    <div class="thumbnail" style="letter-spacing: 0.2em; line-height:1.65; border: none;">
                      <img class="img-responsive" src="assets/img/お辞儀1.png" style="width:100px; margin-top: 10px;margin-bottom: 15px;">
                    </div>

        <form method="POST" action="signin.php" enctype="multipart/form-data">

          <div>
            <!-- <label for="name">お名前</label> -->
            <input type="text" name="input_name" class="form-control signin" id="name" placeholder="お名前" style="height: 3.5em;">
            <?php if(isset($errors['name']) && $errors['name'] == 'blank') { ?>
              <p class="text-danger">お名前を入力してください</p>
            <?php } ?>
          </div>

          <div>
            <!-- <label for="email">メールアドレス</label> -->
            <input type="text" name="input_email" class="form-control signin" id="email" placeholder="メールアドレス" style="height: 3.5em;">
            <?php if(isset($errors['email']) && $errors['email'] == 'blank') { ?>
              <p class="text-danger">メールアドレスを入力してください</p>
            <?php } ?>
          </div>

          <div>
            <!-- <label for="password">パスワード</label> -->
            <input type="password" name="input_password" class="form-control signin" id="password" placeholder="4 ~ 16文字のパスワード" style="height: 3.5em;">
            <?php if(isset($errors['password']) && $errors['password'] == 'blank') { ?>
              <p class="text-danger">パスワードを入力してください</p>
            <?php } ?>
            <?php if(isset($errors['password']) && $errors['password'] == 'length') { ?>
              <p class="text-danger">パスワードは4〜16文字で入力してください</p>
            <?php } ?>
            <?php if(isset($errors['signin']) && $errors['signin'] == 'failed') { ?>
              <p class="text-danger">ログインに失敗しました</p>
            <?php } ?>
          </div>

          <div>
            <button type="submit" class="btn btn-original" style="width:100%;margin-top:20px;">ログイン</button>
          </div>
        </form>

      </div>
    </div><!-- row -->
  </div><!-- container -->
  </div><!-- container -->
  </div><!-- container -->

<!-- </body> -->