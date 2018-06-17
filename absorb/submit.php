<?php

	if (!empty($_POST['id'])) {
		header("Location: check.php?id=".$_POST['id']);
	
	}else{
		echo "以下のフォームにスプレッドシートのIDを入力して下さい。";
	}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
	<meta charset="utf-8">
 	<title>スプレッドシート</title>
</head>
	
<body>

	<h2>注意事項</h2>

	<p>以下のフォームにスプレッドシートのIDを入力していただければ、お客様のスプレッドシート内の情報をPHILIALEに取り込むことができます。ただしいくつか注意点がございますので、是非一読してからIDをご入力ください。</p>

	<h3>スプレッドシートの記載方法</h3>
	<img src="../assets/img/sheet.png"><br>
	<p>上の画像のように、｢A2以下のA列に本のタイトル｣を、｢B2以下のB列に著者｣を記入してください。</p>

	<h3>公開設定</h3>
	<p>PHILIALEにスプレッドシート内の情報を取り込むために、スプレッドシートを公開する必要があります。公開方法については、該当のスプレッドシートを開いた状態で｢ファイル｣を選択、その中の｢ウェブに公開｣を選択してください。そこから先はスプレッドシートの案内通りに設定を行えば設定は完了することと思います。</p>

	<h3>スプレッドシートのID</h3>
	<p>そもそもスプレッドシートのIDについてですが、以下の画像で示した場所がスプレッドシートのIDとなっております。</p>
	<img src="../assets/img/id.jpg"><br>
	<p>上記の場所をコピー&ペーストして以下のフォームにご入力ください。</p>


 	<form action="submit.php" method="POST">
  		<input type="text" name="id">
  		<input type="submit" name="送信">
 	</form>
  
</body>
</html>