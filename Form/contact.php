<?php

session_start();
require('../dbconnect.php');

//$_SESSIONが空の際のデバッグ
if (empty($_SESSION['id'])) {
    $login_chk = false;
} else {
    $login_chk = true;
}

$errors = array();
if (!empty($_POST)) {
    $name    = $_POST['input_name'];
    $comment = $_POST['input_comment'];

    if ($name == '') {
        $errors['name'] = 'name_blank';
    }

    if ($comment == '') {
        $errors['comment'] = 'comment_blank';
    }

    if (empty($errors)) {
        $_SESSION['inquiry']['name']    = $name;
        $_SESSION['inquiry']['comment'] = $comment;

        header("Location:check.php");
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
                <h3 class="content_header">お問い合わせ</h3>
                <p>こちらはPHILIALEへのお問合せページになります。</p>
                <p>皆様のお声をお聞かせ下さい。</p>
                <img class="responsive img-circle logo_original" src="../assets/img/philia2.png">
                <p>お返事には少々お時間を頂いております。</p>
                <p>ご感想・ご意見等は、<a href="https://twitter.com/philia_san" target="blanck">PHILIALE公式Twitter</a>もご用意しておりますので、<br>よろしければそちらにもお寄せください。</p>
            </div>

                <div class="col-xs-12 col-md-6 right-column_c" style="margin-top: 50px;">
                        <?php if ($login_chk == false){ ?>
                         <p style="margin: 100px auto 150px;">お問い合わせにはログインが必要です。</p>
                          <a href="../signin.php"><button type="button" class="btn btn-original">ログイン</button></a>
                          <a href="../top2.php" class="btn btn-default btn-lg btn-block">&laquo;&nbsp;戻る</a>
                       <?php }else{ ?>
                    <form method="POST" action="contact.php" enctype="multipart/form-data">
                            
                        <div>
                            <input type="name" name="input_name" class="form-control" id="name" placeholder="お名前">
                            <?php if(isset($errors['name']) && $errors['name'] == 'name_blank') { ?>
                            <span class="text-danger">お名前が入力されていません</span>
                            <?php } ?>
                        </div>
                        
                        <div>
                            <textarea type="text" name="input_comment" class="form-control" placeholder="メッセージ" id="message"></textarea>
                            <?php if(isset($errors['comment']) && $errors['comment'] == 'comment_blank') { ?>
                              <span class="text-danger">お問合せ内容が入力されていません</span>
                            <?php } ?>
                        </div>
                        <div>
                          <button type="submit" href="#" class="btn btn-original">送　信</button>
                        </div>
                            
                        <?php } ?>
                    </form>
                </div>
        </div>
    </div>
</body>
</html>