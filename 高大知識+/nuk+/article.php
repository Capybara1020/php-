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
	ul{
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}
li a{
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}
li{
  float: left;
}
</style>
<link href="article.css" rel="stylesheet" type="text/css">
<div>

	<ul>
	<li><a href="homepage.php">首頁</a></li>
	<li><a href="homepage.php?type=0">公告</a></li>
	<li><a href="homepage.php?type=1">雜項</a></li>
	<li><a href="homepage.php?type=2">數學</a></li>
	<li><a href="homepage.php?type=3">自然</a></li>
	<li><a href="homepage.php?type=4">人文</a></li>
	<li><a href="homepage.php?type=5">社會</a></li>
	<span style='float:right'>
<?php
	if($_SESSION[$id."-authority"]=='0')
	{
		echo "<li><a href='admin.php'>管理者介面</a></li>
	";
	}
	elseif(isset($type) && $_SESSION[$id."-authority"]==$type)
	{
		echo "<li><a href=''>討論版管理</a></li>
	";
	}
	elseif($_SESSION[$id."-authority"]=='x')
	{
		echo "<li><a href='user/myrecode.php'>個人紀錄</a></li>
	";
	}
?>
	<li><a href='logout.php'>登出</a></li>
	</span>
	</ul>
</div>
<br>
<?php
date_default_timezone_set("Asia/Taipei");
$art_no=$_GET["art_no"];
include("connect.php");
$SQL="SELECT * FROM paste WHERE article_no='$art_no' AND post_no='0'";
$result=mysqli_query($con,$SQL);
while ($row=mysqli_fetch_assoc($result)) {
	$time=date("Y/m/d H:i:s",$row["timing"]);
	$type=$row["type"];
	$title=$row["title"];
	$id=$row["ID"];
	$click=$row["click"];
	$content=$row["content"];

}
echo "<center>";
echo "<div class='atrticle-box'>";
if($_SESSION[$id."-authority"]=='0' || $id==$_COOKIE["id"])
	{
		echo "<div style='float:right'>";
		if($id==$_COOKIE["id"])
		{
			echo "<a href='article_edit.php?art_no=".$row["article_no"]."'>編輯</a>";
			echo "&nbsp";
		}
		echo "<form action='article_delete.php' method='POST'>";
		echo "<input type='hidden' name='art_no' value='".$row["article_no"]."'";	
		echo "<input type='submit' value='刪除'>";
		echo "</form>";
		echo "</div>";	
	}
if($_SESSION[$_COOKIE["id"]."-authority"]=="x")
{
	echo "<div style='float:right'>";
	echo "<a href='warning?id=".$row["ID"]."&ano=".$row["article_no"]."&pno=0'>檢舉</a>";
	echo "</div>";
}
echo "<h1>".$title."</h1>";
echo $id."|".$time."|".$click;

echo "<p>".$content."</p>";
echo "</div><br>";



// 以下為新增留言
$SQL="SELECT * FROM paste WHERE article_no='$art_no' AND post_no!='0'";
$result=mysqli_query($con,$SQL);
$p_count=0;
while ($row=mysqli_fetch_assoc($result)) {
	if($p_count<$row["post_no"])
	{
		$p_count=$row["post_no"];
	}
}
$p_count++;
echo "<div class='atrticle-box'>";
echo "<form action='comment_check.php' method='POST'>
	留言
	<input type='hidden' name='type' value='".$type."'>
	<input type='hidden' name='ano' value='".$art_no."'>
	<input type='hidden' name='pno' value='".$p_count."'>
	<textarea rows='5' cols='50' required name='con'></textarea></br>
	<input type='submit' name='送出'>
	</form>";
echo "</div><br>";



// 以下為留言區
$SQL="SELECT * FROM paste WHERE article_no='$art_no' AND post_no!='0'";
$result=mysqli_query($con,$SQL);
while ($row=mysqli_fetch_assoc($result)) {
echo "<div class='atrticle-box'>";
echo $row["ID"]."|".date("Y/m/d H:i:s",$row["timing"])."|";
echo "string";
	if($_SESSION[$id."-authority"]==$type || $_SESSION[$_COOKIE["id"]."-authority"]=="0")
			{
				echo "<div style='float:right'>
				<form action='comment_delete.php' method='POST'>
					<input type='hidden' name='art_no' value='".$art_no."'>
					<input type='hidden' name='post_no' value='".$row["post_no"]."'>
					<input type='submit' value='刪除'>
				</form>
				</div>";	
			}
if($_SESSION[$_COOKIE["id"]."-authority"]=="x")
{
	echo "<div style='float:right'>";
	echo "<a href='warning?id=".$row["ID"]."&ano=".$row["article_no"]."&pno=0'>檢舉</a>";
	echo "</div>";
}

echo "<p>".$row["content"]."</p>";
$post_no=$row["post_no"];
include("rank.php");
echo "</div><br>";
}
echo "</center>";

?>