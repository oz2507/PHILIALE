<?php

    session_start();
 
    //SESSION変数の破棄(どちらでも可能)
    $_SESSION = array();
  
    //サーバー内の$_SESSION変数のクリア
    session_destroy();
 
    // signin.phpへ移動
    header("Location: top.php");
    exit();
 
?>