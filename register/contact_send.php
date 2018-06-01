    <?php
      $email = $_POST['input_email'];
      $content = $_POST['input_message'];

    // if (isset($email) && isset($content)) {

      // if (mail("philiale0401@gmail.com", "お問合せ", $content,$email))
      // {
      // echo "メールが送信されました。";
      // } else {
      // echo "メールの送信に失敗しました。";
      // }

    // }else{
      // echo "入力欄に不備があります。";
    // }



?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <title>送信完了</title>
  <meta charset="utf-8">

  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
  <!-- <link rel="stylesheet" type="text/css" href="../assets/css/style.css"> -->
  <!-- <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css"><!--グリッドシステムのみ-->
  <!-- <link rel="stylesheet" type="text/css" href="../assets/font-awesome/css/font-awesome.css"> -->
  <!-- <link rel="stylesheet" type="text/css" href="../assets/css/style_register.css"> -->


</head>
<body>

<body style="margin-top: 60px">
  <div class="container">
    <div class="row">
      <div class="col-xs-10 col-xs-offset-1">
        <h2 class="text-center">お問合せ受付完了</h2>
          <div class="col-xs-12 col-md-8 col-md-offset-2 text-center">
            <div class="thumbnail">
              <p class="text-left">メールアドレス<p>
              <p><?php echo $email; ?></p>
            </div>
            <div class="thumbnail">
              <p class="text-left">メッセージ<p>
              <p><?php echo nl2br($content); ?></p>
            </div>
            <div>
              <input type="button" href="../index.html" class="btn btn-secondary btn-lg" value="Back Home">
            </div>
        </div>
      </div>
    </div><!-- row -->
  </div><!-- container -->

  <!-- <script src="../assets/js/jquery-3.1.1.js"></script> -->
  <!-- <script src="../assets/js/jquery-migrate-1.4.1.js"></script> -->
  <!-- <script src="../assets/js/bootstrap.js"></script> -->
</body>
</html>
