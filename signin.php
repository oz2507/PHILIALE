<?php 

session_start();
require('dbconnect.php');

$errors = array();

if (!empty($_POST)) {
    $name     = $_POST['input_name'];
    $email    = $_POST['input_email'];
    $password = $_POST['input_password'];

    $count = strlen($password);

    if ($name == '') {
        $errors['name'] = 'blank';
    }

    if ($email == '') {
        $errors['email'] = 'blank';
    }

    if ($password == '') {
        $errors['password'] = 'blank';

    }elseif ($count < 4 || $count > 16) {
        $errors['password'] = 'length';
    }

    if ($name !== '' && $email !== '' && $password !== '') {
        $sql  = 'SELECT * FROM `users` WHERE `email` = ?';
        $data = array($email);
        $stmt = $dbh->prepare($sql);
        $stmt->execute($data);

        $record = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($record == false) {
            $errors['signin'] = 'failed';
        } else {

            if (password_verify($password,$record['password'])){
                $_SESSION['id'] = $record['id'];

                header("Location: mypage2.php");
                exit();
            }else{
                $errors['signin'] = 'failed';
            }
        }
    }
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>PHILIALE</title>
  <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="assets/css/style_r.css">
  <link rel="shortcut icon" href="assets/img/favicon/favicon.ico" type="image/vnd.microsoft.icon">
  <link rel="icon" href="assets/img/favicon/favicon.ico" type="image/vnd.microsoft.icon">
</head>

<body style="margin-top: 60px">
  <div class="container">
    <div class="row">
      <div class="col-xs-12 col-md-6 col-md-offset-3" style="height:500px;">
        <h2 class="text-center">入館する</h2>

          <div class="row">
                <div class="col-xs-12 text-center">
                    <div class="thumbnail" style="letter-spacing: 0.2em; line-height:1.65; border: none;">
                      <img class="img-responsive" src="assets/img/お辞儀1.png" style="width:100px;margin-top: 30px;">
                    </div>

        <form method="POST" action="signin.php" enctype="multipart/form-data">

          <div>
            <!-- <label for="name">お名前</label> -->
            <input type="text" name="input_name" class="form-control signin" id="name" placeholder="お名前">
            <?php if(isset($errors['name']) && $errors['name'] == 'blank') { ?>
              <p class="text-danger">お名前を入力してください</p>
            <?php } ?>
          </div>

          <div>
            <!-- <label for="email">メールアドレス</label> -->
            <input type="text" name="input_email" class="form-control signin" id="email" placeholder="メールアドレス">
            <?php if(isset($errors['email']) && $errors['email'] == 'blank') { ?>
              <p class="text-danger">メールアドレスを入力してください</p>
            <?php } ?>
          </div>

          <div>
            <!-- <label for="password">パスワード</label> -->
            <input type="password" name="input_password" class="form-control signin" id="password" placeholder="4 ~ 16文字のパスワード">
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
            <button type="submit" class="btn btn-original" style="width:100%;">ログイン</button>
          </div>
        </form>

      </div>
    </div><!-- row -->
  </div><!-- container -->

</body>
</html>