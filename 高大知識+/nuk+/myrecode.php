<?php
session_start();
if(isset($_COOKIE["id"]) && $_SESSION[$_COOKIE["id"]."_logcheck"]=="true"){
	$id=$_COOKIE["id"];
}
else{
	header("Location:login.php");
}
?>
<style type="text/css">
	ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}
li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}
	li {
  float: left;
}
</style>
<link href="article.css" rel="stylesheet" type="text/css">

<div>

	<ul class="ul">
	<li><a href="homepage.php">回首頁</a></li>
	<span style='float:right'>
	<li><a href='logout.php'>登出</a></li>
	</span>
	</ul>
</div>
<br>

<div style='width:20%;float:left;word-break: normal;background-color:#FDFFFF;height:auto;border-radius: 10px;padding: 5px 8px;'>
<?php 
date_default_timezone_set("Asia/Taipei");
include("connect.php");
$SQL="SELECT * FROM account WHERE ID='$id'";
$result=mysqli_query($con,$SQL);
$row=mysqli_fetch_assoc($result);
echo $row["nickname"]."，歡迎登入!!<br>"; 
if($row["logout_time"]!=0)
{
echo "上次登入時間：".date("Y/m/d H:i:s",$row["logout_time"])."<br>";
}
echo "違規次數：".$row["indorsement"];
echo "<form action='account_edit.php' method='POST'>
<input type='hidden' name='id' value='".$id."'>
<input type='submit' value='帳號修改'></form>";
?>
</div>

<?php
$SQL="SELECT * FROM paste WHERE ID='$id'";
$result=mysqli_query($con,$SQL);
echo "<center>";
	while ($row=mysqli_fetch_assoc($result)) {
		echo "<div class='atrticle-box'>";
		echo "<div>";
		echo "<a class='title' href='click.php?art_no=".$row["article_no"]."&click=".$row["click"]."'>".$row["title"]."</a>";

		echo "<span style='float:right'>";
		echo "<a href='article_edit.php?art_no=".$row["article_no"]."'>編輯</a>";
		echo "&nbsp";
		echo "<form action='article_delete.php' method='POST'>";
		echo "<input type='hidden' name='art_no' value='".$row["article_no"]."'";	
		echo "<input type='submit' value='刪除'>";
		echo "</form>";
		echo "</span>";	
		
		echo "<br>";
		echo date("Y/m/d H:i:s",$row["timing"]);

		echo "</div>";
		echo "<p style='color: 	gray'>";
		echo mb_strimwidth($row["content"], 0, 50, "...", "UTF-8");
		echo "</p>";
		echo "</div>";
		echo "<br/>";
	}


?>

