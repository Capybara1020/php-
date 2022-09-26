<link href="article.css" rel="stylesheet" type="text/css">
<?php
session_start();
if(isset($_COOKIE["id"]) && $_SESSION[$_COOKIE["id"]."_logcheck"]=="true"){
	$id=$_COOKIE["id"];
}
else{
	header("Location:login.php");
}
?>
<?php
$sid=$_POST["id"];
include("connect.php");
$SQL="SELECT * FROM account WHERE ID='$sid'";
$result=mysqli_query($con,$SQL);
$row=mysqli_fetch_assoc($result);
$nickname=$row["nickname"];
$password=$row["password"];
$identity=$row["identity"];
echo "<form action='' method='POST'>";
if($row["ID"]==$sid || $_SESSION[$_COOKIE["id"]."-authority"]=='0')
{
	echo "ID：".$sid."<br>";
	echo "更改暱稱<input type='text' name='nickname' value='".$row["nickname"]."'><br>";
	echo "更改密碼<input type='password' name='pwd' value='".$row["password"]."'><br>";
	echo "確認密碼<input type='password' name='pwd_'><br>";
}
if($_SESSION[$_COOKIE["id"]."-authority"]=='0')
{
	echo "修改權限
	<select name='identity'>
	<option value='x'>使用者</option>
	<option value='0'>管理者</option>
	<option value='1'>雜項</option>
	<option value='2'>數學</option>
	<option value='3'>自然</option>
	<option value='4'>人文</option>
	<option value='5'>社會</option>
	</select>";	
}
echo "<input type='hidden' name='id' value='".$sid."'>";
echo "<input type='submit' value='送出'>";
echo "</form>";

if(isset($_POST["nickname"]))
{
	$nickname=$_POST["nickname"];
	

if($_POST["pwd_"]!="")
{
	if($_POST["pwd"]==$_POST["pwd_"])
	{
		$password=$_POST["pwd_"];
	}
}
$identity=$_POST["identity"];
echo $identity;
$SQL="UPDATE account SET nickname='$nickname',password='$password',identity='$identity' WHERE ID='$sid'";
	if($result=mysqli_query($con,$SQL))
	{
		echo "修改成功";
		if($_SESSION[$_COOKIE["id"]."-authority"]=='0')
		header("refresh:3;url=admin.php?page=0");
	}
	else
	{
		echo "修改失敗";
		if($_SESSION[$_COOKIE["id"]."-authority"]=='x')
		header("refresh:3;url=myrecode.php");
	}
}


?>