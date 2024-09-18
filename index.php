<!DOCTYPE html>
<html lang="zh-Tw">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function Delete(id){
            if(confirm("確定要刪除該資料?")){
                window,location.href='delete.php?id='+id;
            }
        }
        function updateData(id){
            window.location.href='update.php?id='+id;
        }
    </script>
    <style>
        .message-box{
            position: relative;
            border: 1px solid #ccc;
            padding: 20px;
            margin-bottom: 15px;
        }
        .edit-btn{
            position: absolute;
            top: 50px;
            right: 10px;
            background-color: blue;
            color: aliceblue;
            cursor: pointer;
            border: 1px solid black;
        }
        .delete-btn{
            position: absolute;
            top: 10px;
            right: 10px;
            background-color: red;
            color: white;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <?php
        require_once("dbtools.inc.php");
        $link=create_connection();
        $sql="SELECT * FROM `message` ORDER BY date DESC";
        $result=execute_sql($link,"guestbook",$sql);

        echo "<table width='800' align='center' cellspacing='3'>";
        $j=1;
        while($row=mysqli_fetch_assoc($result)){
            echo "<tr ><td>";
            echo "<div class='message-box'>";
           
            echo "作者:".$row['author'];echo "&nbsp&nbsp&nbspid:".$row['id'];
            echo "<button class='edit-btn' onclick='updateData(" . $row['id'] . ")'>修改</button><br>";
            echo "<button class='delete-btn' onclick='Delete(".$row['id'].")'>x</button><br>";
            echo "標題:".$row['subject']."<br>";
            echo "內容:".$row['content']."<hr>";
            echo "日期:".$row['date']."</div></td>";
            echo "</tr>";
            $j++;
        }
    mysqli_free_result($result);
    mysqli_close($link);
    ?>
    
    <form action="post.php" name="myForm" method="post">
        <table width="800" align="center" border="0" style="margin-top: 2rem;">
            <tr bgcolor="#0084CA" align="center">
                <td colspan="2">
                    <font color="white">請輸入新的留言</font>
                </td>
            </tr>
            <tr bgcolor="D9F2FF">
                <td width="15%">作者:</td>
                <td width="85%"><input type="text" name="author" size="50"></td>
            </tr>
            <tr bgcolor="84D7FF">
                <td width="15%">標題:</td>
                <td width="85%"><input type="text" name="subject" size="50"></td>
            </tr>
            <tr bgcolor="D9F2FF">
                <td width="15%">內容:</td>
                <td width="85%"><input type="text" name="content" size="50"></td>
            </tr>
            <tr bgcolor="84D7FF">
                <td colspan="2" align="center">
                    <input type="submit" value="送出" onclick="check_data()">
                    <input type="reset" value="重置">
                </td>
            </tr>
        </table>
    </form>
</body>
</html>