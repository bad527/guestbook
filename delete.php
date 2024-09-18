<?php
require_once("dbtools.inc.php");
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $link=create_connection();

    //刪除對應id的數據
    $sql="DELETE FROM `message` WHERE id = $id";
    execute_sql($link,"guestbook",$sql);
    // 關閉連接並重定向回到主頁
    mysqli_close($link);
    header("Location: index.php");
}

?>