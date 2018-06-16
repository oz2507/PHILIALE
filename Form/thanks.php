<?php

	require('../dbconnect.php');

 	$nickname = $_POST['nickname'];
 	$email = $_POST['email'];
 	$content = $_POST['content'];

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