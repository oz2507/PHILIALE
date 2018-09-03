<?php

session_start();
$errors = array();

if (!empty($_POST)) {
    $name     = $_POST['input_name'];
    $email    = $_POST['input_email'];
    $password = $_POST['input_password'];
    $check    = $_POST['input_chk_password'];

    $count     = strlen($password);
    $chk_count = strlen($check);

    if ($name == '') {
        $errors['name'] = 'blank';
    } else {
        require('../dbconnect.php');

        $sql  = 'SELECT COUNT(*) as `cnt` FROM `users` WHERE `name` = ?';
        $data = array($name);
        $stmt = $dbh->prepare($sql);
        $stmt->execute($data);

        $dbh = null;

        $rec = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($rec['cnt'] > 0) {//メールアドレスの数が0異常ですでに登録済み
            $errors['name'] = 'duplication';
        }
    }

    if ($email == '') {
        $errors['email'] = 'blank';
    } else {
        require('../dbconnect.php');

        $sql  = 'SELECT COUNT(*) as `cnt` FROM `users` WHERE `email` = ?';
        $data = array($email);
        $stmt = $dbh->prepare($sql);
        $stmt->execute($data);

        $dbh = null;

        $rec = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($rec['cnt'] > 0) {//メールアドレスの数が0異常ですでに登録済み
            $errors['email'] = 'duplication';
        }
    }

    if ($password == '') {
        $errors['password'] = 'blank';

    } elseif ($count < 4 || $count > 16) {
        $errors['password'] = 'length';
    }

    if ($check == '') {
        $errors['check'] = 'blank';

    } elseif ($chk_count < 4 || $chk_count > 16) {
        $errors['check'] = 'length';
    }

    if (empty($errors)) {
        $_SESSION['register']['name']     = $_POST['input_name'];
        $_SESSION['register']['email']    = $_POST['input_email'];
        $_SESSION['register']['password'] = $_POST['input_password'];

      header('Location: check.php');
      exit();
    }
}

?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>PHILIALE</title>
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/style_r.css">
  <?php  require('../partial/favicon.php');  ?>
</head>
<body style="margin-top: 60px">
  <div class="container">
    <div class="row">
      <!-- ここに左サイドコンテンツ -->
      <div class="col-xs-12 col-md-6 left-column">
        <h3 class="content_header">入館手続</h3>
          <p>ようこそPHILIALEへおいで下さいました。</p>
          <P>ご利用の前に、入館手続をお願い致します。</p>
          <img class="img-responsive img-circle logo_original" src="../assets/img/philia2.png">
          <p>当館では、皆様個人のためだけの図書館を作る事が出来ます。</p>
          <p>本好きな当館支配人もまた、数多の本を所蔵しております。</p>
          <p>それでは、本の世界へ行ってらっしゃいませ。</p>
      </div>

      <!-- ここに右サイドコンテンツ -->
      <div class="col-xs-12 col-md-6 right-column" style="margin-top: 50px;">
 
        <form method="POST" action="signup.php" enctype="multipart/form-data">  
          <div>
            <input type="text" name="input_name" class="form-control" id="name" placeholder="お名前">
            <span>　</span>
            <span>　</span>
              <?php if(isset($errors['name']) && $errors['name'] == 'blank') { ?>
              <span class="text-danger">お名前を入力してください</span>
              <?php } ?>
              <?php if(isset($errors['name']) && $errors['name'] == 'duplication') { ?>
              <span class="text-danger">すでに存在するお名前です</span>
              <?php } ?>
          </div>

          <div>
            <input type="email" name="input_email" class="form-control" id="email" placeholder="メールアドレス">
            <span>　</span>
            <?php if(isset($errors['email']) && $errors['email'] == 'blank') { ?>
              <span class="text-danger">メールアドレスを入力してください</span>
            <?php } ?>
            <?php if(isset($errors['email']) && $errors['email'] == 'duplication') { ?>
              <span class="text-danger">すでに登録されたメールアドレスです</span>
            <?php } ?>
          </div>

          <div>
            <input type="password" name="input_password" class="form-control" id="password" placeholder="パスワード">
            <span>　</span>
            <?php if(isset($errors['password']) && $errors['password'] == 'blank') { ?>
              <span class="text-danger">パスワードを入力してください</span>
            <?php } ?>
            <?php if(isset($errors['password']) && $errors['password'] == 'length') { ?>
              <span class="text-danger">パスワードは4〜16文字で入力してください</span>
            <?php } ?>
          </div>

          <div>
            <input type="password" name="input_chk_password" class="form-control" id="chk_password" placeholder="確認用パスワード">
            <span>　</span>
            <?php if(isset($errors['check']) && $errors['check'] == 'blank') { ?>
              <span class="text-danger">確認用パスワードを入力してください</span>
            <?php } ?>
            <?php if(isset($errors['check']) && $errors['check'] == 'length') { ?>
              <span class="text-danger">パスワードは4〜16文字で入力してください</span>
            <?php } ?>
          </div>

          <div>
            <button type="submit" class="btn btn-original">登録情報の確認</button>
          </div>
        </form>
      </div>

    </div>
  </div>
  
</body>
</html>