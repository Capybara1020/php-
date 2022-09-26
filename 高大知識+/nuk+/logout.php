<?php
session_start();
$id=$_COOKIE["id"];
unset($_SESSION[$id."_logcheck"]);
$time=time();
include("connect.php");
$SQL="UPDATE account SET logout_time='$time' WHERE ID='$id'";
$result=mysqli_query($con, $SQL);

header("Location:login.php");


?>