<?php

session_start();
require('../dbconnect.php');

if (isset($_POST['future_isbn'])) {
    $isbn = $_POST["future_isbn"];

    $data        = "https://www.googleapis.com/books/v1/volumes?q=isbn:$future_isbn";
    $json        = file_get_contents($data);
    $json_decode = json_decode($json);
    $posts       = $json_decode->items;

    if (isset($posts[0]->volumeInfo->title)) {
        $user_id = $_SESSION["id"];
        $book    = $posts[0]->volumeInfo->title;
        $author  = $posts[0]->volumeInfo->authors[0];

    if (isset($_POST['img'])) {
        $img = $_POST["img"];
    } else {
        $img = null;
    }

    if (isset($_POST['comment'])) {
        $comment = $_POST["comment"];
    } else {
        $comment = null;
    }

    $future_sql = 'INSERT INTO `future_archives` SET `user_id` = ?, `isbn_code` = ?, `book_title` = ?, `book_author` = ?, `book_img` = ?, `comment` = ?';

    $future_data = array($user_id,$isbn,$book,$author,$img,$comment);
    $future_stmt = $dbh->prepare($sql);
    $future_stmt->execute($data);

    }else{
      echo "isbnを入力してください。";
    }
}