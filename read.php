<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<?php
$number = $_POST['number'];
$username = $_SESSION['username'];
include("mysql_connect.inc.php");

$sql="select * from jason.pydict where english = '$number'";

$row = @mysql_fetch_row($result);
$result = mysql_query($sql) or die('MySQL query error');
	
if($number !=null)
{
	while($row = mysql_fetch_row($result))
    {
		echo "$row[0] - 英文單字：$row[1] <br><br> 中文解釋：$row[2]<br>";
		$m=$row["0"];
		$e=$row["1"];
		$c=$row["2"];
		echo "曾查詢此單字:";
		$sql="SELECT COUNT(*) FROM search_record WHERE `english`= '$number' && `user`='$username'";
		$result = mysql_query($sql) or die("無法執行：".mysql_error());
		$row=mysql_fetch_array($result);
		echo $row['COUNT(*)'];
		echo "次";
		$sql="INSERT INTO `joefan`.search_record (`master_id`, `english`, `chinese`, `time`, `user`) VALUES ( '" . $m. "','" . $e. "', '" . $c. "',now(), '".$username."' );";
		$result = mysql_query($sql) or die("無法執行：".mysql_error());
		echo '<br>';
	}
}
else
{
	echo "找不到此單字!";
}
?>