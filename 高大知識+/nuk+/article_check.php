<?php

$title=$_POST["title"];
$type=$_POST["type"];
$post_no=0;
$content=$_POST["content"];
$time=time();
$id=$_COOKIE["id"];
$ano=$time."-".$id."-".$type;
echo $type."<br>";
include("connect.php");
$SQL="INSERT INTO 
paste(type,timing,id,article_no,post_no,content,title) VALUES('$type','$time','$id','$ano','$post_no','$content','$title')";

if($result=mysqli_query($con,$SQL))
{
	header('Location:article.php?art_no='.$ano.'');
}
else
{
	echo "文章新增失敗<br/>";
}







?>