<?php
$nn=$_POST["nickname"];
$id=$_POST["id"];
$pwd=$_POST["pwd"];
$pwdc=$_POST["pwd_check"];

if($pwd==$pwdc)
{
	include("connect.php");	
	$SQL="INSERT INTO account(nickname,ID,password,identity) VALUES('$nn','$id','$pwd','x')";
	if($result=mysqli_query($con, $SQL))
	{
		echo "註冊成功";
		header("Refresh:3;url=login.php");
	}
	else
	{
		echo "發生錯誤";
		header("Refresh:5;url=signup.php");
	}
}
else
{
	echo "確認密碼錯誤";
	header("Refresh:5;url=signup.php");
}

?>