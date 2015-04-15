<!doctype html>

<html lang="en">
    <head>
    <title>單字查詢</title>
    </head>
    <body>
    <section id="main" class="column">
      <div class="module_content">
        <h1>查詢單字英文名稱</h1>
        <form method="post" action="read2.php">
          <br>
          欲查詢單字英文名稱：
          <input type="text" name="number" />
          </br>
		  <br>
          <input type="submit" value="ok">
		  
        </form>
        <?php
header("Content-Type:text/html; charset=utf8");
error_reporting(0);
$link=@mysql_connect("localhost" , "s10144101" ,"s10144101");
if(!$link) echo "資料庫無法連線";
//設定使用UTF8編碼
mysql_query("SET NAMES 'utf8'");
//選擇資料庫
mysql_select_db('jason');
//設定SQL語法
$sql="select * from pydict";
//執行SQL語法
$result = mysql_query($sql) or die("執行錯誤：".mysql_error());

echo $main;
?>
      </div>
      <article class="module width_full"> </article>
      <div class="spacer"></div>
    </section>
</body>
</html>