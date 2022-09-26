<?php
$article_no=$_GET["art_no"];
include("connect.php");
$SQL="DELETE FROM paste WHERE article_no='$article_no'";
if($result=mysqli_query($con,$SQL))
{
	echo "刪除成功";
	header("Refresh:3");
	echo "<script>history.back(-2)</script>";

}
else
{
	echo "刪除失敗";
	header("Refresh:3");
	echo "<script>history.back(-1)</script>";
}
?>