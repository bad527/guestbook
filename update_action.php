<?php
require_once("dbtools.inc.php");

    $id = $_POST['id'];
    $author= $_POST['author'];
    $subject= $_POST['subject'];
    $content= $_POST['content'];

    $link=create_connection();

    $sql="UPDATE `message` SET `author`='$author',`subject`='$subject',`content`='$content' WHERE `id`='$id'";
    execute_sql($link,"guestbook",$sql);
    
    echo "<script>window.location.href='index.php';</script>";
    mysqli_close($link);

?>