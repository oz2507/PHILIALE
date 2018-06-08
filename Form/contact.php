<?php

//テーブル名をcontactsで作成(カラムは名前、メアド、コメント)

    session_start();  // $_SESSIONを使うための合図
    $errors = array();

    $flag = 0;


    if (!empty($_POST)) {//POST送信があった時--ここから
        $name = $_POST['input_name'];
        $email = $_POST['input_email'];
        $comment = $_POST['input_comment'];
        //名前空チェック
        if ($name == '') {
          $errors['name'] = 'name_blank';
        }
        //メールアドレス空チェック
        if ($email == '') {
          $errors['email'] = 'email_blank';
        }
        //コメント空チェック
        if ($comment == '') {
          $errors['comment'] = 'comment_blank';
        }

        if (empty($errors)) {
        require('../dbconnect.php');
        $sql='INSERT INTO `contacts`(`name`,`email`,`comment`) VALUES (?,?,?)';
        $data = array($name,$email,$comment);
        $stmt = $dbh->prepare($sql);
        $stmt->execute($data);
        $dbh = null;

        $flag = 1;

        }
        session_destroy();
    }

// echo "<pr>";
// echo $flag;
// echo "<pr>";
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>PHILIALE</title>
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/style_r.css">
  <link rel="stylesheet" type="text/css" href="../assets/font-awesome/css/font-awesome.css">
  <?php  require('../partial/favicon.php');  ?>
</head>
<body style="margin-top: 60px">
  <div class="container">
    <div class="row">
      <!-- ここに左サイドコンテンツ -->
      <div class="col-xs-12 col-md-6 left-column">
        <h3 class="content_header">お問い合わせ</h3>
          <p>こちらはPHILIALEへのお問合せページになります。<br>当館へのご感想、ご意見等をご連絡ください。<br></p>
          <img class="responsive img-circle logo_original" src="../assets/img/philia2.png">
          <p>こちらの館へも足を運ぶよう心がけておりますが、広い館内ゆえ<br>お返事には少々お時間を頂いております。<br>ご感想などは、ツイッターもご用意してございます。<br>よろしければ是非こちらまでお寄せください。
            <a href="https://twitter.com/hashtag/PHILIALE?src=hash"><i class="fa fa-twitter-square fa-2x" style="color: white;" aria-hidden="true"></i></a></p>
      </div>

      <!-- ここに右サイドコンテンツ -->
      <!-- 入力前の表示 -->
    <?php if ($flag == 0){ ?>
      <div class="col-xs-12 col-md-6 right-column_c">
        <form class="form-group" method="POST" action="" enctype="multipart/form-data">
          <div>
            <input type="name" name="input_name" class="form-control" id="name" placeholder="お名前">
            <span>　</span>
            <?php if(isset($errors['name']) && $errors['name'] == 'name_blank') { ?>
              <span class="text-danger">お名前が入力されていません</span>
            <?php } ?>
          </div>
          <div>
            <input type="email" name="input_email" class="form-control" id="email" placeholder="メールアドレス">
            <span>　</span>
            <?php if(isset($errors['email']) && $errors['email'] == 'email_blank') { ?>
              <span class="text-danger">メールアドレスが入力されていません</span>
            <?php } ?>
          </div>
          <div>
            <textarea type="text" name="input_comment" class="form-control" placeholder="メッセージ" id="message"></textarea>
            <span>　</span>
            <?php if(isset($errors['comment']) && $errors['comment'] == 'comment_blank') { ?>
              <span class="text-danger">お問合せ内容が入力されていません</span>
            <?php } ?>
          </div>
          <div class="right_btn">
          <button type="submit" href="#" class="btn">送　信</button>
          </div>
        </form>
      </div>
    <?php } ?>


      <!-- ここに右サイドコンテンツ -->
      <!-- 入力完了後の表示 -->
    <?php if ($flag == 1){ ?>
      <div class="col-xs-12 col-md-6 right-column_c">
        <div><p>お問合せ有難うございました</p>
        </div>
          <div>
            <span>お名前</span><br>
            <label><?php echo htmlspecialchars($name); ?></label>
          </div>
          <div>
            <span>メールアドレス</span><br>
            <label><?php echo htmlspecialchars($email); ?></label>
          </div>
          <div>
            <span>メッセージ</span><br>
            <label><?php echo nl2br(htmlspecialchars($comment)); ?></label>
          </div>
          <br><br>
          <div class="right_btn" style="margin-top: 100px;">
            <a href="../top.php"><button type="button" class="btn">Back Home</button></a>
          </div>
      </div>
    <?php } ?>
    </div>
  </div>
</body>
</html>
