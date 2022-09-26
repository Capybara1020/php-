<?php
$id=$_COOKIE["id"];
$evaluation=$_GET["score"];
$ano=$_GET["ano"];
$pno=$_GET["pno"];
$a=$_GET["a"];
$time=time();
include("connect.php");
if($a==1)	
{
	$SQL="UPDATE evaluation SET evaluation='$evaluation' WHERE ID='$id' AND article_no='$ano' AND post_no='$pno' ";
	$result=mysqli_query($con,$SQL);
	header("Location:article.php?art_no=".$ano);
}
else
{
$SQL="INSERT INTO evaluation(ID,article_no,post_no,timing,evaluation) VALUES('$id','$ano','$pno','$time','$evaluation')";
	if($result=mysqli_query($con,$SQL))
	{
			header("Location:article.php?art_no=".$ano);
	}	
}

?>