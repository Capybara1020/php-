
<?php
session_start();
$type=$_GET['type'];
if(isset($_COOKIE["id"]) && $_SESSION[$_COOKIE["id"]."_logcheck"]=="true"){
	$id=$_COOKIE["id"];

}
else{
	header("Location:login.php");
}
if($_SESSION[$id."-authority"]==$type)
	{

	}
else
{
	header("Location:homepage.php");
}
echo "<a href='homepage.php?type=".$type."'>回上一頁
</a>";

echo "<table style=border:1px padding:5px rules=all cellpadding=5><tr><th width=80><strong>檢舉人</strong></th><th width=80><strong>被檢舉人</strong></th><th width=80><strong>理由</strong></th><th width=80><strong>貼文</strong></th><th width=80><strong>留言</strong></th><th width=80><strong>通過</strong></th><th width=80><strong>駁回</strong></th><th width=80><strong>狀態</strong></th>";
include("connect.php");
$SQL="SELECT * FROM warn_save";
$result=mysqli_query($con, $SQL);
while($row=mysqli_fetch_assoc($result))
{ 
	echo "<tr><td>".$row["id"]."</td>"."</br>";
	echo "<td>".$row["warn_id"]."</td>";
	echo "<td>".$row["reason"]."</td>";
	echo "<td>".$row["artical_no"]."</td>";
	echo "<td>".$row["post_no"]."</td>";
	echo "<td><a href='warnaccept.php?wid=".$row["warn_id"]."&idn=".$row["indorse_no"]."&type=".$type."'>通過</a></td>";
	echo "<td><a href='warnrefuse.php?idn=".$row["indorse_no"]."&type=".$type."'>駁回</a></td>";
	if($row["state"]=='0')
	{
		echo "<td>未處理</td>";
	}
	else if($row["state"]=='1')
	{
		echo "<td>已通過</td>";
	}
	else if($row["state"]=='2')
	{
		echo "<td>未通過</td>";
	}
	echo "</tr>";
}







?>