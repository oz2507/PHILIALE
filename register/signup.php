<?php

  session_start();

  $errors = array();

  if (!empty($_POST)) { 
      //ポスト送信があったとき以下を実行
      $name = $_POST['input_name'];
      $email = $_POST['input_email'];
      $password = $_POST['input_password'];
      // passwordの文字列を数える
      $count = strlen($password);


        // ユーザー名の空チェック
        if ($name == '') {
            $errors['name'] = 'blank';
        }else{
            require('../dbconnect.php');

            $sql = 'SELECT COUNT(*) as `cnt` FROM `users` WHERE `name`=?';
            $data = array($name);
            $stmt = $dbh->prepare($sql);
            $stmt->execute($data);

            $dbh = null;
            $rec = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($rec['cnt'] > 0) {
            //数が0以上ですでに登録済み
                $errors['name'] = 'duplication';
            }
        }

        // メールアドレスの空チェック
        if ($email == '') {
            $errors['email'] = 'blank';
        }else{
            require('../dbconnect.php');

            $sql = 'SELECT COUNT(*) as `cnt` FROM `users` WHERE `email`=?';
            $data = array($email);
            $stmt = $dbh->prepare($sql);
            $stmt->execute($data);

            $dbh = null;
            $rec = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($rec['cnt'] > 0) {
            //メールアドレスの数が0以上ですでに登録済み
                $errors['email'] = 'duplication';
            }
        }


        if ($password == '') {
            $errors['password'] = 'blank';
        }elseif ($count < 4 || $count > 16) {
            $errors['password'] = 'length';
        }

            if (empty($errors)) {
                $_SESSION['register']['name'] = $_POST['input_name'];
                $_SESSION['register']['email'] = $_POST['input_email'];
                $_SESSION['register']['password'] = $_POST['input_password'];
                // 上記3つは$_SESSION['register'] = $_POST;

                header('Location: check.php');
                exit();
            }
  }
    
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>Learn SNS</title>
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/style_r.css"> <!-- 追加 -->
  <!-- <link rel="stylesheet" type="text/css" href="../assets/font-awesome/css/font-awesome.css"> -->
</head>
<body style="margin-top: 60px">
  <div class="container">
    <div class="row">
      <!-- ここに左サイドコンテンツ -->
      <div class="col-xs-12 col-md-6 left-column">
        <h3 class="content_header">アカウント新規登録</h3>
          <p><label>PHILIALEのご利用有難うございます。<br>ご入館の前に、ご登録をお願いいたします。<br></label></p>
          <img class="img-responsive img-circle logo_original" src="../assets/img/cat_collection/フィリアさん1.png">
          <p>当館では文庫やコミック、情報誌などなんでもご登録出来ます。<br>本好きな当館支配人もまた、数多の本をお持ちだそうです。<br>皆様はどのような本がお好きでしょう。<br></p><p><br></p>

      </div>

      <!-- ここに右サイドコンテンツ -->
      <div class="col-xs-12 col-md-6 right-column">
        <!-- アカウント作成 -->
        <form method="POST" action="signup.php" enctype="multipart/form-data">
          <div class="form-group">
            <!-- ユーザー名の入力欄 -->
            <input type="text" name="input_name" class="form-control" id="name" placeholder="ユーザーネーム" style="height:3em;">
              <?php if(isset($errors['name']) && $errors['name'] == 'blank') { ?>
              <p class="text-danger">ユーザー名を入力してください</p>
              <?php } ?>
              <?php if(isset($errors['name']) && $errors['name'] == 'duplication') { ?>
              <p class="text-danger">すでに存在するユーザーネームです</p>
              <?php } ?>
          </div>

          <div class="form-group">
            <!-- メールアドレスの入力欄 -->
            <input type="email" name="input_email" class="form-control" id="email" placeholder="example@gmail.com">
            <?php if(isset($errors['email']) && $errors['email'] == 'blank') { ?>
              <p class="text-danger">メールアドレスを入力してください</p>
            <?php } ?>
            <?php if(isset($errors['email']) && $errors['email'] == 'duplication') { ?>
              <p class="text-danger">すでに登録されたメールアドレスです</p>
            <?php } ?>
          </div>

          <div class="form-group">
            <!-- パスワード入力欄 -->
            <input type="password" name="input_password" class="form-control" id="password" placeholder="パスワード">
            <?php if(isset($errors['password']) && $errors['password'] == 'blank') { ?>
              <p class="text-danger">パスワードを入力してください</p>
            <?php } ?>
            <?php if(isset($errors['password']) && $errors['password'] == 'length') { ?>
              <p class="text-danger">パスワードは4〜16文字で入力してください</p>
            <?php } ?>
          </div>

          <div class="form-group">
            <!-- 確認用パスワード -->
            <input type="password" name="input_chk_password" class="form-control" id="chk_password" placeholder="確認用パスワード">
            <?php if(isset($errors['chk_password']) && $errors['chk_password'] == 'blank') { ?>
              <p class="text-danger">確認用パスワードを入力してください</p>
            <?php } ?>
            <?php if(isset($errors['chk_password']) && $errors['chk_password'] == 'length') { ?>
              <p class="text-danger">パスワードは4〜16文字で入力してください</p>
            <?php } ?>
          </div>
          <br><br><br>
          <input type="submit" class="btn btn-secondary btn-lg btn-block" value="登録情報の確認">
          <a href="../signin.php" style="float: right; padding-top: 6px;" class="text-success">サインイン</a>
        </form>
      </div>

    </div>
  </div>

</body>
</html>
