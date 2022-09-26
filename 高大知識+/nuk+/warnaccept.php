<?php
$wid=$_GET["wid"];
$idn=$_GET["idn"];
$type=$_GET['type'];
$count+=1;
$state="1";
include("connect.php");

$SQL="UPDATE account SET indorsement='$count' WHERE id='$wid'" ;
$result1=mysqli_query($con,$SQL);

$SQL2="UPDATE warn_save SET state='$state' WHERE indorse_no='$idn'" ;
$result2=mysqli_query($con,$SQL2);

header('Location:indorse.php?type='.$type);

?>