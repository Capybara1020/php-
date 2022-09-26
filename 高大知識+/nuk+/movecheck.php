<?php

	$ano=$_POST["ano"];
	$type=$_POST["type"];

include("connect.php");
$SQL="UPDATE paste SET type='$type' WHERE article_no='$ano'";
if($result=mysqli_query($con, $SQL))
{
	header('location:homepage.php');
}
else
{
	echo "failed";
}

?>