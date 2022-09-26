<?php
$art_no=$_POST["art_no"];
$post_no=$_POST["post_no"];

include("connect.php");

$SQL="DELETE FROM paste WHERE article_no='$art_no' AND post_no='$post_no'";
if($result=mysqli_query($con, $SQL))
{
	header("location:article.php?art_no=".$art_no);
}
else
{
	echo "failed";
}
?>