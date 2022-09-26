<form action="warning.php" method="post">
檢舉理由
<select name="type">
<option value="1">不實內容</option>
<option value="2">違反善良風俗</option>
<option value="3">侵害著作權</option>
<option value="4">其他</option></select><br/>
<?php
if(isset($_GET["id"]))
{
echo "<input type='hidden' name='id' value='".$_GET["id"]."'>";
echo "<input type='hidden' name='ano' value='".$_GET["ano"]."'>";
echo "<input type='hidden' name='pno' value='".$_GET["pno"]."'>";
}
?>
<input type="submit" name=" 送出">

</form>
<button onclick='history.back(-1)'>回上一頁</button>
<?php
if(isset($_POST["type"]))
{
		$reason=$_POST["type"];
$wid=$_POST["id"];
$pno=$_POST["pno"];
$ano=$_POST["ano"];
$id=$_COOKIE["id"];
$ido=$id."-".$wid."-".$reason;
$state="0";

include("connect.php");
$SQL="INSERT INTO warn_save(id,warn_id,reason,post_no,artical_no,indorse_no,state) VALUES('$id','$wid','$reason','$pno','$ano','$ido','$state')";


if($result=mysqli_query($con, $SQL))
{
	echo "檢舉成功";
		header("refresh:3;url=article.php?art_no=".$ano);
}
else
{
	echo "發生錯誤";
}

}
?>