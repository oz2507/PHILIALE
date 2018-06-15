<?php
  session_start();
   // var_dump($_POST);

  if (!isset($_SESSION['register'])) {
    header("Location: signup.php");
    exit();
  }

    // ①
    $name = $_SESSION['register']['name'];
    $email = $_SESSION['register']['email'];
    $user_password = $_SESSION['register']['password'];
    // $img_name = $_SESSION['register']['img_name'];
 
  // echo "<pre>";
  // var_dump($_SESSION);
  // echo "</pre>";

    if (!empty($_POST)) {

      require('../dbconnect.php');

          $sql = 'INSERT INTO `users` SET `name`=?, `email`=?, `password`=? ';
          $data = array($name, $email, password_hash($user_password, PASSWORD_DEFAULT),);
          $stmt = $dbh->prepare($sql);
          $stmt->execute($data);

          $dbh = null;

      unset($_SESSION['register']);
          header('Location: thanks.php');
          exit();

    }

?>

<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>PHILIALE</title>
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/style_r.css">
  <link rel="shortcut icon" href="../assets/img/favicon/favicon.ico" type="image/vnd.microsoft.icon">
  <link rel="icon" href="../assets/img/favicon/favicon.ico" type="image/vnd.microsoft.icon">
</head>
<body style="margin: 60px 0;">
  <div class="container">
    <div class="row">
      <!-- <div class="col-xs-12 col-md-8 col-md-offset-2"> -->
        <div class="col-xs-12 col-md-6 col-md-offset-3" style="height:500px;">
        <h2 class="text-center">登録情報の確認</h2>
        <br><br><br>
        <div class="row">
          <div class="col-xs-12">
            <!-- <div class="thumbnail"> -->
              <div class="form-group">
              <span>お名前</span>
              <p class="lead text-center"><?php echo htmlspecialchars($name); ?>&nbsp;様</p>
            </div>
            <!-- <div class="thumbnail"> -->
              <div class="form-group">
              <span>メールアドレス</span>
              <p class="lead text-center"><?php echo htmlspecialchars($email); ?></p>
            </div>
            <!-- <div class="thumbnail"> -->
              <div class="form-group">
              <span>パスワード</span>
              <!-- ② -->
              <p class="lead text-center">●●●●●●●●</p>
            </div>
            <!-- ③ -->
            <form method="POST" action="">
              <!-- ⑤ -->
              <input type="hidden" name="action" value="submit">
              <input type="submit" class="btn btn-secondary btn-lg btn-block" value="  ユーザー登録  " style="margin-top: 50px;">
              <!-- ④ -->
              <a href="signup.php" class="btn btn-default btn-lg btn-block">&laquo;&nbsp;戻る</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- <script src="../assets/js/jquery-3.1.1.js"></script> -->
  <!-- <script src="../assets/js/jquery-migrate-1.4.1.js"></script> -->
  <!-- <script src="../assets/js/bootstrap.js"></script> -->
</body>
</html>

