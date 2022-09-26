<div style='width:20%;float:left;word-break: normal;background-color:#FDFFFF;height:auto;border-radius: 10px;padding: 5px 8px;'>
<?php
date_default_timezone_set("Asia/Taipei");
$SQL="SELECT * FROM account WHERE ID='$id'";
$result=mysqli_query($con,$SQL);
$row=mysqli_fetch_assoc($result);
echo $row["nickname"]."，歡迎登入!!<br>"; 
echo "時間：".date("Y/m/d H:i:s",time())."<br>";
$admin="0";
$user="0";
$moderator="0";
$SQL="SELECT * FROM account";
$result=mysqli_query($con,$SQL);
while($row=mysqli_fetch_assoc($result)) 
{
	if($row["login_time"]>$row["logout_time"])
	{
		if($row["identity"]=="0")
		{	
			$admin+=1;
		}
		elseif($row["identity"]=="x")
		{
			$user+=1;
		}
		else
		{
			$moderator+=1;
		}
	}
}
$total=$user+$moderator+$admin;
echo "在線人數：<br>";
echo "使用者&nbsp".$user."<br>";
echo "版主&nbsp".$moderator."<br>";
echo "管理者&nbsp".$admin."<br>";
?>
</div>
	<div class='atrticle-box' style="margin-left: 27%">
<ul  style='background-color:#FDFFFF;height:50px;'>
<li style='padding: 14px;width:20%;margin: auto;text-align:center'>暱稱</li>
<li style='padding: 14px;width:30%;margin: auto;text-align:center'>帳號</li>
<li style='padding: 14px;width:10%;margin: auto;text-align:center'>上線狀態</li>
</ul>
<div style='border-bottom-style:solid;height: 1px'> </div>
<?php

$SQL="SELECT * FROM account";
$result=mysqli_query($con,$SQL);

while($row=mysqli_fetch_assoc($result)) 
{
	echo "<ul  style='background-color:#FDFFFF;height:50px;'>";
	echo "<li style='padding: 14px;width:20%;margin: auto;text-align:center'>".$row["nickname"]."</li>";
	echo "<li style='padding: 14px;width:30%;margin: auto;text-align:center'>".$row["ID"]."</li>";
	if($row["login_time"]>$row["logout_time"])
	{
		echo "<li style='padding: 14px;width:10%;margin: auto;text-align:center'>上線中</li>";
	}
	elseif($row["login_time"]<$row["logout_time"])
	{
		$last_logtime=time()-$row["logout_time"];
		if($last_logtime>30*86400)
		{
			$last_logtime=(int)($last_logtime/30*86400);
			echo "<li style='padding: 14px;width:10%;margin: auto;text-align:center'>".$last_logtime."個月前</li>";
		}
		elseif($last_logtime>7*86400)
		{
			$last_logtime=(int)($last_logtime/7*86400);
			echo "<li style='padding: 14px;width:10%;margin: auto;text-align:center'>".$last_logtime."周前</li>";
		}
		elseif($last_logtime>86400)
		{
			$last_logtime=(int)($last_logtime/86400);
			echo "<li style='padding: 14px;width:10%;margin: auto;text-align:center'>".$last_logtime."日前</li>";
		}
		elseif($last_logtime>3600)
		{
			$last_logtime=(int)($last_logtime/3600);
			echo "<li style='padding: 14px;width:10%;margin: auto;text-align:center'>".$last_logtime."小時前</li>";
		}
		elseif($last_logtime>60)
		{
			$last_logtime=(int)($last_logtime/60);
			echo "<li style='padding: 14px;width:10%;margin: auto;text-align:center'>".$last_logtime."分鐘前</li>";
		}
		else
		{
			echo "<li style='padding: 14px;width:10%;margin: auto;text-align:center'>".$last_logtime."秒前</li>";
		}
	}
	else
	{
		echo "<li style='padding: 14px;width:10%;margin: auto;text-align:center'></li>";
	}
	echo "<li style='padding: 14px;width:10%;margin: auto;text-align:center'>";
	echo "<form action='account_edit.php' method='POST'>";
	echo "<input type='hidden' name='id' value='".$row["ID"]."'>";
	echo "<input type='submit' value='修改'>";
	echo "</form>";
	echo "</li>";
	echo "</ul>";
	echo "<div style='border-bottom-style:solid;height: 1px'> </div>";
}
header("refresh:5;url=admin.php?page=".$page);
?>

	</div>
