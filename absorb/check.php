<?php

$id = $_GET['id'];

$data = "https://spreadsheets.google.com/feeds/list/$id/od6/public/values?alt=json";

$json = file_get_contents($data);
$json_decode = json_decode($json);

$books = $json_decode->feed->entry;

 // echo "<pre>";
 // var_dump($books);
 // echo "</pre>";
?>

<!DOCTYPE html>
<html>
<head>
 <title>スプレッドシート</title>
  <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.min.css"><!-- グリッドシステムのみ -->
  <link rel="stylesheet" type="text/css" href="../assets/css/style_absorb.css">
  <?php require("../partial/favicon.php"); ?>
</head>
<body>
 <!-- <form action="absorb.php?id=<?php echo $_GET['id']; ?>" method="GET">
  <input type="text" name="id">
  <input type="submit" name="送信">
 </form> -->
  <div class="container">

<!-- import button -->
    <div class="row">
      <div class="head">
        <h1>検索結果</h1>
          <a href="absorb.php?id=<?php echo $id; ?>">
          	<button class="import_btn">この内容でフィリアールの書庫に保管</button>
          </a>
      </div>
    </div>

        <?php if (isset($_GET['id'])) { 
         foreach($books as $book){ ?>
    <div class="row">
      <div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2">
        <p>作品名 :<span><?php echo $book->title->{'$t'}; ?>&ensp;</span></p>
        <p>著者名 :<span><?php echo $book->content->{'$t'}; ?></span></p>
      </div>
    </div><!-- row -->
  <!-- <p>------------------------------------------------</p> -->
  <?php } ?>
  <?php } ?>


<!-- view sample -->
    <div class="row">
      <div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2">
        <div class="list_form">
          <p>作品名 :<span>Harry Potter and the Philosopher's Stone (Harry Potter 1)&ensp;</span></p>
          <p>著者名 :<span>J. K. Rowling </span></p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2">
        <div class="list_form">
          <p>作品名 :<span>零戦 その誕生と栄光の記録&ensp;</span></p>
          <p>著者名 :<span>堀越 二郎</span></p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2">
        <div class="list_form">
          <p>作品名 :<span>アウシュヴィッツを志願した男 ポーランド軍大尉、ヴィトルト・ピレツキは三度死ぬ&ensp;</span></p>
          <p>著者名 :<span>小林 公二</span></p>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-xs-10 col-xs-offset-1 col-md-8 col-md-offset-2">
        <div class="list_form">
          <p>作品名 :<span>The Life and Strange Surprizing Adventures of Robinson Crusoe, of York, Mariner: Who lived Eight and Twenty Years, all alone in an un‐inhabited Island on the Coast of America, near the Mouth of the Great River of Oroonoque; Having been cast on Shore by Shipwreck, wherein all the Men perished but himself. With An Account how he was at last as strangely deliver’d by Pyrates&ensp;</span></p>
          <p>著者名 :<span>Daniel Defoe</span></p>
        </div>
      </div>
    </div>
<!-- view sample -->




  </div>
</body>
</html>