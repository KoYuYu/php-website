<!doctype html>
<?php session_start(); error_reporting(0);
?>
<html lang="en">
    <head>
    <title></title>
    </head>
    <body>
    <section id="main" class="column">
      <div class="module_content">
<h1>查詢成功！</h1>
<?php
$number = $_POST['number'];
$username = $_SESSION['username'];
include("mysql_connect.inc.php");


$row = @mysql_fetch_row($result);

header("Content-Type:text/html; charset=utf8");
error_reporting(0);
$link=@mysql_connect("localhost" , "s10144101" ,"s10144101");
if(!$link) echo "資料庫連不上！";
mysql_query("SET NAMES 'utf8'");
mysql_select_db('jason');



$number = $_POST['number'];
if($number!= null)
{
	$sql="select * from pydict where english = '$number'";
	
	$result = mysql_query($sql) or die("無法執行：".mysql_error());
	$main="<table border=2>";
	if($data=mysql_fetch_assoc($result)){
		$main.="<tr>
		<td>英文</td>
		<td>解釋</td>
		<tr>
		<td>{$data['english']}</td>
		<td>{$data['chinese']}</td>
		</tr>";
		$main.="</table>";
		echo $main;
		echo "本單字查詢次數:";
		$sql="select * from search_record where `user`='$username' order by searchnum DESC limit 0, 10";	
		$mid=$data['master_id'];
		$eng=$data['english'];
		$chi=$data['chinese'];
		$user=$data['user'];
		$sql="SELECT COUNT(*) AS C1 FROM search_record WHERE `english`= '$eng'";
		$result = mysql_query($sql) or die("無法執行：".mysql_error());
		$row=mysql_fetch_array($result);
		echo $row['C1'];
		$sql="INSERT INTO `jason`.search_record (`master_id`,`english`, `chinese`, `time`, `user`) VALUES ( '".$mid."','".$eng."', '".$chi."',now(), '".$user."' );";
		$result = mysql_query($sql) or die("無法執行：".mysql_error());
		echo '<br>';
	}
}
?>


        <form method="post" action="member.php">
          <input type="submit" value="回到單字查詢">
        </form>
      </div>
      <article class="module width_full"> </article>
      <div class="spacer"></div>
    </section>
</body>
</html>