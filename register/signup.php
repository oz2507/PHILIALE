<?php
    // PHPプログラム
session_start();


$errors = array();

    if (!empty($_POST)) { //ポスト送信があったとき以下を実行
        $name = $_POST['input_name'];
        $email = $_POST['input_email'];
        $password = $_POST['input_password'];

        $count = strlen($password);// hogehogeとパスワードを入力した場合、8が$countに代入される


           // ユーザー名の空チェック
          if ($name == '') {
            $errors['name'] = 'blank';
          }

          else{
                require('../dbconnect.php');

                $sql = 'SELECT COUNT(*) as `cnt` FROM `users` WHERE `name`=?';
                $data = array($name);
                $stmt = $dbh->prepare($sql);
                $stmt->execute($data);

                $dbh = null;

                $rec = $stmt->fetch(PDO::FETCH_ASSOC);

                // var_dump($rec);

                if ($rec['cnt'] > 0) {//メールアドレスの数が0異常ですでに登録済み
                  $errors['name'] = 'duplication';
                }

          }

          if ($email == '') {
            $errors['email'] = 'blank';
          }
          //重複しているかの確認
          else{
                require('../dbconnect.php');

                $sql = 'SELECT COUNT(*) as `cnt` FROM `users` WHERE `email`=?';
                $data = array($email);
                $stmt = $dbh->prepare($sql);
                $stmt->execute($data);

                $dbh = null;

                $rec = $stmt->fetch(PDO::FETCH_ASSOC);

                // var_dump($rec);

                if ($rec['cnt'] > 0) {//メールアドレスの数が0異常ですでに登録済み
                  $errors['email'] = 'duplication';
                }

          }


          if ($password == '') {
            $errors['password'] = 'blank';
          }

          elseif ($count < 4 || $count > 16) {
            $errors['password'] = 'length';
          }

        // //画像名を取得
        //   $file_name = $_FILES['input_img_name']['name'];
        // // echo $file_name."<br>";
        //   if (!empty($file_name)) {
        //     $file_type = substr($file_name, -3); // 画像名の後ろから3文字を取得
        //       $file_type = strtolower($file_type); // 大文字が含まれていた場合すべて小文字化
        //       if ($file_type != 'jpg' && $file_type != 'png' && $file_type != 'gif') {
        //         $errors['img_name'] = 'type';
        //       }
        //   }
            
        //   else {
        //   $errors['img_name'] = 'blank';
        //   }

          if (empty($errors)) {
            $date_str = date('YmdHis'); // YmdHisを指定することで取得フォーマットを指定
            $submit_file_name = $date_str . $file_name;
            // echo $date_str;
            // echo "<br>";
            // echo $submit_file_name;
            move_uploaded_file($_FILES['input_img_name']['tmp_name'], '../user_profile_img/'.$submit_file_name);

            $_SESSION['register']['name'] = $_POST['input_name'];
            $_SESSION['register']['email'] = $_POST['input_email'];
            $_SESSION['register']['password'] = $_POST['input_password'];
            // 上記3つは$_SESSION['register'] = $_POST;という書き方で1文にまとめることもできます
            $_SESSION['register']['img_name'] = $submit_file_name;


            header('Location: check.php');
            exit();

          }
        // echo "<pre>";
        // var_dump($file_type);
        // var_dump($errors);
        // echo "</pre>";

    }
    
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <title>Learn SNS</title>
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/style_r.css"> <!-- 追加 -->
  <?php  require('../partial/favicon.php');  ?>
</head>
<body style="margin-top: 60px">
  <div class="container">
    <div class="row">
      <!-- ここに左サイドコンテンツ -->
      <div class="col-xs-12 col-md-6 left-column">
        <h3 class="content_header">アカウント新規登録</h3>
          <p><label>PHILIALEのご利用有難うございます。<br>ご入館の前に、ご登録をお願いいたします。<br></label></p>
          <img class="img-responsive img-circle logo_original" src="../assets/img/philia2.png">
          <p>当館では文庫やコミック、情報誌などなんでもご登録出来ます。<br>本好きな当館支配人もまた、数多の本をお持ちだそうです。<br>皆様はどのような本がお好きでしょう。<br></p><p><br></p>

      </div>

      <!-- ここに右サイドコンテンツ -->
      <div class="col-xs-12 col-md-6 right-column">
        <!-- <h2 class="text-center content_header">アカウント作成</h2> -->
        <form method="POST" class="form-group" action="signup.php" enctype="multipart/form-data">
          <div>
            <!-- <label for="name">ユーザー名</label> -->
            <input type="text" name="input_name" class="form-control" id="name" placeholder="ユーザーネーム" style="height:3em;">
            <span>　</span>
            <span>　</span>
              <?php if(isset($errors['name']) && $errors['name'] == 'blank') { ?>
              <span class="text-danger">ユーザー名を入力してください</span>
              <?php } ?>
              <?php if(isset($errors['name']) && $errors['name'] == 'duplication') { ?>
              <span class="text-danger">すでに存在するユーザーネームです</span>
              <?php } ?>
          </div>

          <div>
            <!-- <label for="email">メールアドレス</label> -->
            <input type="email" name="input_email" class="form-control" id="email" placeholder="example@gmail.com">
            <span>　</span>
            <?php if(isset($errors['email']) && $errors['email'] == 'blank') { ?>
              <span class="text-danger">メールアドレスを入力してください</span>
            <?php } ?>
            <?php if(isset($errors['email']) && $errors['email'] == 'duplication') { ?>
              <span class="text-danger">すでに登録されたメールアドレスです</span>
            <?php } ?>
          </div>

          <div>
            <!-- <label for="password">パスワード</label> -->
            <input type="password" name="input_password" class="form-control" id="password" placeholder="パスワード">
            <span>　</span>
            <?php if(isset($errors['password']) && $errors['password'] == 'blank') { ?>
              <span class="text-danger">パスワードを入力してください</span>
            <?php } ?>
            <?php if(isset($errors['password']) && $errors['password'] == 'length') { ?>
              <span class="text-danger">パスワードは4〜16文字で入力してください</span>
            <?php } ?>
          </div>

          <div>
            <!-- <label for="password">確認用パスワード</label> -->
            <input type="password" name="input_chk_password" class="form-control" id="chk_password" placeholder="確認用パスワード">
            <span>　</span>
            <?php if(isset($errors['chk_password']) && $errors['chk_password'] == 'blank') { ?>
              <span class="text-danger">確認用パスワードを入力してください</span>
            <?php } ?>
            <?php if(isset($errors['chk_password']) && $errors['chk_password'] == 'length') { ?>
              <span class="text-danger">パスワードは4〜16文字で入力してください</span>
            <?php } ?>
          </div>
          <br><br><br>
          <div class="right_btn" style="margin-top: 70px;">
          <button type="submit" class="btn">登録情報の確認</button>
          </div>
          <a href="../signin.php" style="float: right; padding-top: 6px;" class="text-success">サインイン</a>
        </form>
      </div>

    </div>
  </div>
  <!-- <script src="../assets/js/jquery-3.1.1.js"></script> -->
  <!-- <script src="../assets/js/jquery-migrate-1.4.1.js"></script> -->
  <!-- <script src="../assets/js/bootstrap.js"></script> -->
</body>
</html>
