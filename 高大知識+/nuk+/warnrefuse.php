<?php
$state="2";
$type=$_GET['type'];
$idn=$_GET["idn"];
include("connect.php");
$SQL="UPDATE warn_save SET state='$state' WHERE indorse_no='$idn'" ;
$result=mysqli_query($con,$SQL);

header('Location:indorse.php?type='.$type);


?>