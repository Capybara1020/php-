<?php
$id=$_POST["id"];
$pwd=$_POST["pwd"];
session_start();
include("connect.php");
$SQL="SELECT * FROM account WHERE ID='$id' AND password='$pwd'";
$result=mysqli_query($con, $SQL);

if($row=mysqli_fetch_assoc($result)){
	setcookie("id", $id , time()+86400);
	$_SESSION[$id."_logcheck"]="true";
	$_SESSION[$id."-authority"]=$row["identity"];
	$time=time();
	$SQL="UPDATE account SET login_time='$time' WHERE ID='$id'";
	$result=mysqli_query($con, $SQL);
	header('Location:homepage.php');
}
else{
	echo "登入失敗<br/>";
	header("Refresh:3;url=login.php");
}

?>