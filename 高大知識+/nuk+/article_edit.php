<?php
session_start();
if(isset($_COOKIE["id"]) && $_SESSION[$_COOKIE["id"]."_logcheck"]=="true"){
	$id=$_COOKIE["id"];
}
else{
	header("Location:login.php");
}
$art_no=$_GET["art_no"];
include("connect.php");
$SQL="SELECT * FROM paste WHERE article_no='$art_no' AND post_no='0'";
$result=mysqli_query($con,$SQL);
$row=mysqli_fetch_assoc($result);
$title=$row["title"];
$content=$row["content"];
?>
<link href="article.css" rel="stylesheet" type="text/css">
<center>
	<div style="height: 30%"></div>
<div class='atrticle-box' >
<form action="" method="POST">
	<?php
	echo "標題<br><input type='text' name='title' value='".$title."'><br>";
	
	echo "內容<br><textarea style='width:100%;height:20%;'' required name='content'>".$content."</textarea><br>";
	?>
	<input style="float:left" type="button" value="取消" onclick="history.back()">
	<input style="float:right" type="submit" value="更改"><br>

</form>
</div>
</center>


<?php
if(isset($_POST["title"]))
{
	$tile=$_POST["title"];
}
if(isset($_POST["content"]))
{
	$content=$_POST["content"];

$time=time();
$SQL="UPDATE paste SET title='$title',content='$content',timing='time' WHERE article_no='$art_no' AND ID='$id'";
if($result=mysqli_query($con,$SQL))
{
	echo "<center>修改成功</center>";
	header("refresh:3;url=article.php?art_no=".$art_no);
}
else
{
	echo "<center>修改失敗</center>";
}
}


?>
