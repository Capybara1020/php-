<?php
$art_no=$_GET["art_no"];
$click=$_GET["click"];
$click+=1;
include("connect.php");
$SQL="UPDATE paste SET click='$click' WHERE article_no='$art_no' AND post_no=0" ;
$result=mysqli_query($con,$SQL);

header('Location:article.php?art_no='.$art_no);
?>