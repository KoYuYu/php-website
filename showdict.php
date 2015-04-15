<p>

<?

$link=mysqli_connect(“localhost","s10144101","s10144101″) or die (“無法開啟Mysql資料庫連結"); //建立mysql資料庫連結

mysqli_select_db($link, “jason"); //選擇資料庫abc

$sql = “SELECT * FROM dict"; //在test資料表中選擇所有欄位

mysqli_query($link, ‘SET CHARACTER SET utf8′);	// 

mysqli_query($link,  “SET collation_connection = ‘utf8_general_ci"");

$result = mysqli_query($link,$sql); // 執行SQL查詢

//$row = mysqli_fetch_assoc($result); //將陣列以欄位名索引

//$row = mysqli_fetch_row($result); //將陣列以數字排列索引

$total_fields=mysqli_num_fields($result); // 取得欄位數

$total_records=mysqli_num_rows($result);  // 取得記錄數

?>

</p>

<table  border="1″>

<tr>

<td>id</td>

<td>english</td>

<td>chinese</td>



</tr>

<? for ($i=0;$i<$total_records;$i++) {$row = mysqli_fetch_assoc($result); //將陣列以欄位名索引   ?>

<tr>

<td><? echo $row[id];   ?></td>        <!–印出id欄位的值–>

<td><? echo $row[english];   ?></td> <!–印出english欄位的值–>

<td><? echo $row[chinese]; ?></td>       <!–印出chinese欄位的值–>

</tr>

<?    }   ?>

</table>