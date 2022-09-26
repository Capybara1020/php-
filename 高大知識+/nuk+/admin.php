<?php
session_start();
if(isset($_COOKIE["id"])){
	$id=$_COOKIE["id"];
	if($_SESSION[$id."-authority"]=='0')
	{
		if(isset($_GET["page"]))
		{
			$page=$_GET["page"];
		}
		else
		{
			$page=0;
			header("refresh:0;url=admin.php?page=".$page);
		}
	}
	else
	{
		header("Location:login.php");
	}
}
else
{
	header("Location:login.php");
}
include("connect.php");

?>
<style type="text/css">
	ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}
li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}
	li {
  float: left;
}
</style>

<link href="article.css" rel="stylesheet" type="text/css">
<ul>
<li><a href="homepage.php">回首頁</a></li>
<li><a href="admin.php?page=0">帳號管理</a></li>
<li><a href="admin.php?page=1">點閱率分析</a></li>
<li><a href="admin.php?page=2">評價分析</a></li>
<li><a href="admin.php?page=3">上線人數分析</a></li>
<span style='float:right'>
<li><a href='logout.php'>登出</a></li>
</span>
</ul>
<br>

<?php

if(isset($_GET["page"]) && $_GET["page"]=="0")
	include("admin_account.php");
if(isset($_GET["page"]) && $_GET["page"]=="1")
	include("admin_click.php");
if(isset($_GET["page"]) && $_GET["page"]=="2")
	include("admin_evaluation.php");
?>