<?php session_start(); error_reporting(0);  ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.inc.php");
echo '<a href="logout.php">登出</a>  <br><br>';
//此判斷為判定觀看此頁有沒有權限
//說不定是路人或不相關的使用者
//因此要給予排除
$username = $_SESSION['username'];

echo "Hi，";
echo $username;
if($_SESSION['username'] != null)
{
        echo '<a href="register.php">新增</a>    ';
        echo '<a href="update.php">修改</a>    ';
        echo '<a href="delete.php">刪除</a>  <br><br>';
    
       
}
else
{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=index.php>';
}
?>
單字查詢<br></br>

<br></br>
<form method="post" action="test.php">
          進行單字測驗：
          <input type="submit" value="ok">
 </form>

      </div>
      <article class="module width_full"> </article>
      <div class="spacer"></div>
    </section>
<form method="post" action="test_7000.php">
          進行7000單字測驗：
          <input type="submit" value="ok">
 </form>
 <form method="post" action="test_600.php">
          進行TOEFL單字測驗：
          <input type="submit" value="ok">
 </form>
<form name="form" method="post" action="member.php">
<br>請輸入欲查詢之單字
<br>
<input type="text" name="word" /> <br>
<input type="submit" name="button" value="查詢" />
</form>
<?php
$word = $_POST['word'];
if($word!= null)
{
$sql="select * from pydict where english = '$word'";
$result = $mysqli -> query($sql) or die("無法執行：".mysql_error());
$main="<table border=2>";
if($data=$result -> fetch_row()){
$main.="<tr>
<td>英文</td>
<td>解釋</td>
<tr>
<td>{$data['1']}</td>
<td>{$data['2']}</td>
</tr>";
$main.="</table>";

echo $main;
echo "本單字查詢次數:";
$mid=$data['0'];
$eng=$data['1'];
$chi=$data['2'];
$sql="SELECT COUNT(*) FROM `search_$username` WHERE `english`= '$word'";
$result = $mysqli -> query($sql) or die("無法執行：".mysql_error());
$row=$result -> fetch_row();
echo $row[0];
$sql="INSERT INTO `jason`.`search_$username` (`master_id`,`english`, `chinese`, `time`) VALUES ( '".$mid."','".$eng."', '".$chi."',now() );";
$result = $mysqli -> query($sql) or die("無法執行：".mysql_error());
echo '<br>';
}
}
?>
<p align="middle">
<?php
echo '<br>';
echo "查詢歷史紀錄";
echo '<br>';
echo '<br>';
$sql="select * from `search_$username` GROUP BY english order by searchnumber DESC limit 0, 10";
$result = $mysqli -> query($sql) ;
while ($search = $result -> fetch_row())
{
echo $search['2'];
echo "   -   ";
echo $search['3'];
echo "   -   ";
echo $search['4'];
echo '<br>';
}

?>
</p>