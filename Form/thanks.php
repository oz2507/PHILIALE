<?php
 	$nickname = $_POST['nickname'];
 	$email = $_POST['email'];
 	$content = $_POST['content'];

  	// １．データベースに接続する
	$dsn = 'mysql:dbname=inquiry;host=localhost';
	$user = 'root';
	$password = '';
	$dbh = new PDO($dsn, $user, $password);
	$dbh->query('SET NAMES utf8');

	// ２．SQL文を実行する
	$sql = "INSERT INTO `inquiry_system` SET `nickname`='".$nickname."',`email`='".$email."', `content`='".$content."'";
	
	$stmt = $dbh->prepare($sql);
	$stmt->execute();

	

?>


<!DOCTYPE html>
<html lang="ja">
<head>
  <title>送信完了</title>
  <meta charset="utf-8">
</head>
<body>
  <h1>お問い合わせありがとうございました！</h1>
<h3>お問い合わせ詳細内容</h3>
    <p>ニックネーム：<?php echo $nickname; ?></p>
    <p>メールアドレス：<?php echo $email; ?></p>
    <p>お問い合わせ内容：<?php echo $content; ?></p>

    <a href="index.html"><button>Homeに戻る</button></a>
</body>
</html>