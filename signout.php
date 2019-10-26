<?php

session_start();
$_SESSION = array();

session_destroy();

header("Location: top2.php");
exit();