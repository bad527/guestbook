<?php
require_once("dbtools.inc.php");

if(isset($_GET["id"])){
    $id=$_GET["id"];
    $link=create_connection();

    //查詢當前留言的數據
    $sql="SELECT * FROM `message` WHERE id =$id";
    $result=execute_sql($link,"guestbook",$sql);
    $row=mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($link);
}else{
    echo "為提供有效的id!";
    exit;    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>修改留言</title>
</head>
<body>
    <form action="update_action.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>">  <!--隱藏字段，保存id-->
        <table width="800" align="center" border="0" style="margin: top 2rem;">
            <tr bgcolor="#0084CA" align="center">
                <td colspan="2">
                    <font color="white">修改留言</font>
                </td>
            </tr>
            <tr bgcolor="D9F2FF">
                <td width="15%">作者:</td>
                <td width="85%"><input type="text" name="author" size="50" value="<?php echo $row['author']; ?>"></td>
            </tr>
            <tr bgcolor="84D7FF">
                <td width="15%">標題:</td>
                <td width="85%"><input type="text" name="subject" size="50" value="<?php echo $row['subject']; ?>"></td>
            </tr>
            <tr bgcolor="D9F2FF">
                <td width="15%">作者:</td>
                <td width="85%"><input type="text" name="content" size="50" value="<?php echo $row['content']; ?>"></td>
            </tr>
            <tr bgcolor="84D7FF">
                <td colspan="2" align="center">
                    <input type="submit" value="確認修改">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>