<?php

session_start();
require('dbconnect.php');

$errors = array();

if (!empty($_POST)) {
    $book_id  = $_GET['id'];
    $book_img = $_FILES['book_img']['name'];

    if (!empty($book_img)) {
        $file_type = substr($book_img, -4);
        $file_type = strtolower($file_type);

        if ($file_type != '.jpg' && $file_type != '.png' && $file_type != '.gif' && $file_type != 'jpeg') {
            $errors['img_name'] = 'type';
        }
    }
}

if(empty($errors)) {
    date_default_timezone_set('Asia/Manila');
    $date_str         = date('YmdHis');
    $submit_file_name = $date_str . $book_img;

    move_uploaded_file($_FILES['book_img']['tmp_name'],'book_img/' . $submit_file_name);

    $book_title  = $_POST['book_title'];
    $book_author = $_POST['book_author'];
    $img         = $submit_file_name;
    $comment     = $_POST["comment"];

    $count = strlen($img);

    if ($count > 14) {
        $sql  = 'UPDATE `future_archives` SET `book_title` = ?, `book_author` = ?, `book_img` = ?,`comment` = ? WHERE `id` = ?';
        $data = array($book_title,$book_author,$img,$comment,$book_id);
    } else {
        $sql  = 'UPDATE `future_archives` SET `book_title` = ?, `book_author` = ?,`comment` = ? WHERE `id` = ?';
        $data = array($book_title,$book_author,$comment,$book_id);
    }

    $stmt = $dbh->prepare($sql);
    $stmt->execute($data);
}

header("Location:mypage2.php");