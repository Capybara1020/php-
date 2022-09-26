<?php
session_start();
$id="";
if(isset($_COOKIE["id"])){
$id=$_COOKIE["id"];
}
if(isset($_SESSION[$_COOKIE["id"]."_logcheck"]))
{
	header("Location:homepage.php");
}
?>
<html>
<head>
<link rel="stylesheet" type="text/css" href="login.css">
</head>
<div class="body"></div>
		<div class="grad"></div>
		<div class="header">
			<div >高大<span>知識+</span></div>
		</div>
		<br>
		<div class="login">
			<form action="logincheck.php" method="POST">
				<?php
				echo "<font face='微軟正黑體' size='5'>學號：</font>"."<input type='text' placeholder='ID' value=".$id." name='id'><br>"
				?>
				<font face="微軟正黑體" size="5">密碼：</font><input type="password" placeholder="password" name="pwd"><br>
				<input type="submit" value="Login">
				<input type="button" value="sign up" onclick="location.href='signup.php'">
			</form>
			

		</div>
</html>