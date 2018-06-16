<?php

	if (!empty($_POST['id'])) {
		header("Location: check.php?id=".$_POST['id']);
	
	}else{
		echo "以下のフォームにスプレッドシートのIDを入力して下さい。";
	}

?>


<!DOCTYPE html>
<html>
<head>
 <title>スプレッドシート</title>
</head>
<body>
 <form action="submit.php" method="POST">
  <input type="text" name="id">
  <input type="submit" name="送信">
 </form>
  
</body>
</html>