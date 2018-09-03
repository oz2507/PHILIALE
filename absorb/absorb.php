<?php

session_start();
require('../dbconnect.php');

$id   = $_GET['id'];
$data = "https://spreadsheets.google.com/feeds/list/$id/od6/public/values?alt=json";

$json        = file_get_contents($data);
$json_decode = json_decode($json);

$books = $json_decode->feed->entry;


if (isset($_GET['id'])) { 
    foreach ($books as $book ){
        $title  = $book -> title -> {'$t'};
        $author = $book -> {'gsx$作者'} -> {'$t'};
		
        $insert_sql = 'INSERT INTO `past_archives` SET user_id = ?, book_title = ?, book_author = ?';

        $insert_data = array($_SESSION['id'],$title,$author);
        $insert_stmt = $dbh->prepare($insert_sql); 
        $insert_stmt -> execute($insert_data);
	  } 
}
header("Location:../mypage2.php");