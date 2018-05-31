<?php
  session_start();
  $name = $_SESSION['register']['name'];

// echo $name;

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
        <h2 class="text-center">登録完了</h2>
        <div class="row">
          <div class="col-xs-12 text-center">
            <div class="thumbnail" style="letter-spacing: 0.2em; line-height:1.65;">
              <label><?php echo $name; ?>&nbsp;様</label>
              <p class="" >
              ようこそ。お待ちしておりました。<br>
              この度は当館へのご登録、まことに有難うございます。<br>
              どうぞ心ゆくまで当館にて読書をお楽しみください。<br>
              </p>
              <img class="img-responsive img-circle" src="../assets/img/philia_san.jpg">
              <!-- PHILIALEの支配人をしております -->
            </div>
            <form method="POST" action="">
              <input type="button" href="../signin.php" class="btn btn-secondary btn-lg" value="  サインイン  ">
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

