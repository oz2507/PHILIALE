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
  <title>Learn SNS</title>
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../assets/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
</head>
<body style="margin-top: 60px">
  <div class="container">
    <div class="row">
      <div class="col-xs-8 col-xs-offset-2">
        <h2 class="text-center">登録情報の確認</h2>
        <br><br><br>
        <div class="row">
          <div class="col-xs-12">
            <div class="thumbnail">
              <span>ユーザーネーム</span>
              <p class="lead"><?php echo htmlspecialchars($name); ?></p>
            </div>
            <div class="thumbnail">
              <span>メールアドレス</span>
              <p class="lead"><?php echo htmlspecialchars($email); ?></p>
            </div>
            <div class="thumbnail">
              <span>パスワード</span>
              <!-- ② -->
              <p class="lead">●●●●●●●●</p>
            </div>
            <!-- ③ -->
            <form method="POST" action="">
              <!-- ⑤ -->
              <input type="hidden" name="action" value="submit">
              <input type="submit" class="btn btn-secondary btn-lg btn-block" value="  ユーザー登録  ">
              <!-- ④ -->
              <a href="signup.php" class="btn btn-default btn-lg btn-block">&laquo;&nbsp;戻る</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="../assets/js/jquery-3.1.1.js"></script>
  <script src="../assets/js/jquery-migrate-1.4.1.js"></script>
  <script src="../assets/js/bootstrap.js"></script>
</body>
</html>

