<?php
$type=$_POST["type"];
$ano=$_POST["ano"];
$cont=$_POST["con"];
$time=time();
$id=$_COOKIE["id"];
$pno=$_POST["pno"];
$title=" ";

include("connect.php");
$SQL="INSERT INTO paste(type,timing,ID,article_no,post_no,content,title) VALUES('$type','$time','$id','$ano','$pno','$cont','$title')";
if($result=mysqli_query($con,$SQL))
{
	echo "新增成功";
	header('Location:article.php?art_no='.$ano);

}
else
{
	echo "新增失敗";
}
?>