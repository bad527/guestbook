<?php
require_once("dbtools.inc.php");
$link=create_connection();
date_default_timezone_set("Asia/Taipei");
$author=$_POST["author"];
$subject=$_POST["subject"];
$content=$_POST["content"];
$current_time=date("Y-m-d H:i:s");
$sql="INSERT INTO `message` (`author`,`subject`,`content`,`date`) 
    VALUES('$author','$subject','$content','$current_time')";
$result=mysqli_query($link,$sql);



mysqli_close($link);

header("location:index.php");
exit();
?>