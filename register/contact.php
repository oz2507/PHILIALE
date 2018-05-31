<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>Learn SNS</title>
  <link rel="stylesheet" type="text/css" href="../assets/css/style.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/style_register.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css"><!--グリッドシステムのみ-->
  <link rel="stylesheet" type="text/css" href="../assets/font-awesome/css/font-awesome.css">

</head>
<body style="margin-top: 60px">
  <div class="container">
    <div class="row">
      <!-- ここに左サイドコンテンツ -->
      <div class="col-xs-12 col-md-6 left-column">
        <h3 class="content_header">お問い合せ</h3>
          <p>
          こちらはPHILIALEへのお問合せページになります。<br>
          当館へのご感想、ご意見等をご連絡ください。<br>
        </p>
        <img class="responsive img-circle logo" src="../assets/img/philia_logo.jpg">
        <p>
          こちらの館へも足を運ぶよう心がけておりますが、広い館内ゆえ<br>
          お返事には少々お時間を頂いております。<br>
          ご感想などは、ツイッターもご用意してございます。<br>
          よろしければ是非こちらまでお寄せください。
        </p>
      </div>

      <!-- ここに右サイドコンテンツ -->
      <div class="col-xs-12 col-md-6 right-column">

        <form class="form-group" method="POST" action="contact_send.php" enctype="multipart/form-data">
          <div>
            <input type="email" name="input_email" class="form-control" id="email" placeholder="メールアドレス">
          </div>
          <div>
            <textarea type="text" name="input_message" class="form-control" placeholder="メッセージ" id="message"></textarea>
          </div>

          <button type="submit" href="contact_send.php" class="btn btn-lg btn-original">送信</button>
        </form>
      </div>

    </div>
  </div>
  <script src="../assets/js/jquery-3.1.1.js"></script>
  <script src="../assets/js/jquery-migrate-1.4.1.js"></script>
  <script src="../assets/js/bootstrap.js"></script>
</body>
</html>
