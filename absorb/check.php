<?php

$id = $_GET['id'];

$data = "https://spreadsheets.google.com/feeds/list/$id/od6/public/values?alt=json";

$json = file_get_contents($data);
$json_decode = json_decode($json);

$books = $json_decode->feed->entry;

?>

<!DOCTYPE html>
<html>
<head>
 <title>スプレッドシート</title>
</head>
<body>

  <h1>検索結果</h1>
  
  <?php if (isset($_GET['id'])) { 
   foreach($books as $book ){?>
  <p>本のタイトル :<?php echo $book->title->{'$t'}; ?></p>

  <p><?php echo $book->content->{'$t'}; ?></p>
  <p>------------------------------------------------</p>
  <?php } ?>
  <?php } ?>

  <a href="absorb.php?id=<?php echo $id; ?>">
  	<p>保管</p> 
  </a>
  
</body>
</html>