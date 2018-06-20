<?php

  session_start();
	require('../dbconnect.php');

 	$user_id = $_SESSION['id'];
  $name = $_SESSION['inquiry']['name'];
  $comment = $_SESSION['inquiry']['comment'];


	$sql = 'INSERT INTO `contacts` SET `user_id`=?, `name`=?, `comment`=? ';

  $data = array($user_id,$name,$comment);
	$stmt = $dbh->prepare($sql);
	$stmt->execute($data);

?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <title>送信完了</title>
  <meta charset="utf-8">
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/style_r.css">
  <?php  require('../partial/favicon.php');  ?>
</head>
<body style="margin-top: 40px">
<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-6 col-md-offset-3" style="height:300px;">
            <h2 class="text-center">お問合せ有難うございました!</h2>
            <div class="row">
                <div class="col-xs-12 text-center">
                    <div class="thumbnail" style="letter-spacing: 0.2em; line-height:1.65; border: none;">
                      <img class="img-responsive" src="../assets/img/お辞儀2.png" style="width:200px;margin-bottom: 20px;margin-top: 10px;">

                      <br>     
                    <div class="form-group">
                        <span>お名前</span>
                        <p class="lead text-center"><?php echo htmlspecialchars($name); ?>&nbsp;様</p>
                    </div>
            
                    <div class="form-group infobox" style="height:150px;">
                        <span>メッセージ</span>
                        <p class="lead text-center"><?php echo htmlspecialchars($comment); ?></p>
                    </div>
            
                    <div class="right_btn">
                      <a href="../top.php"><button type="button" class="btn btn-original">Back Home</button></a>
                    </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
  </div>      
</body>
</html>