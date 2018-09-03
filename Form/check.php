<?php

session_start();
require('../dbconnect.php');

$user_id = $_SESSION['id'];

if (!isset($_SESSION['inquiry'])) {
    header("Location: contact.php");
    exit();
}

$name    = $_SESSION['inquiry']['name'];
$comment = $_SESSION['inquiry']['comment'];

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
<body style="margin: 60px 0;">
  <div class="container">
    <div class="row">
      
        <div class="col-xs-12 col-md-6 col-md-offset-3" style="height:500px;">
        <h2 class="text-center">お問い合わせ内容の確認</h2>
        <br><br><br>
        <div class="row">
          <div class="col-xs-12">
            
              <div class="form-group">
              <span>お名前</span>
              <p class="lead text-center"><?php echo htmlspecialchars($name); ?>&nbsp;様</p>
              </div>

              <div class="form-group infobox" style="height:200px;">
              <span>メッセージ</span>
              <p class="lead text-center"><?php echo htmlspecialchars($comment); ?></p>
              </div>
            
            <form method="POST" action="thanks.php">
              
              <input type="hidden" name="action" value="submit">
              <input type="submit" class="btn btn-secondary btn-lg btn-block" value="お問合わせ" style="margin-top: 50px;">
              
              <a href="contact.php" class="btn btn-default btn-lg btn-block">&laquo;&nbsp;戻る</a>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  
</body>
</html>