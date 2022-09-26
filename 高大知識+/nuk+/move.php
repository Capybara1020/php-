<?php
$ano=$_POST["art_no"];

include("connect.php");
$SQL="SELECT * FROM paste WHERE article_no='$ano'";
$result=mysqli_query($con, $SQL);
while ($row=mysqli_fetch_assoc($result)) {
	$type=$row["type"];
	$title=$row["title"];
}	

echo "<form action='movecheck.php' method='post'>";
echo "文章標題：".$title."<br>";
echo "<input type='hidden' name='ano' value='".$ano."'>";
echo "原分類:".$type."</br>";
?>
更改分類<br>
<select name='type'>
	<option value='0' <?php if($type==0){echo "selected";}?>>公告</option>
	<option value='1' <?php if($type==1){echo "selected";}?>>雜項</option>
	<option value='2' <?php if($type==2){echo "selected";}?>>數學</option>
	<option value='3' <?php if($type==3){echo "selected";}?>>自然</option>
	<option value='4' <?php if($type==4){echo "selected";}?>>人文</option>
	<option value='5' <?php if($type==5){echo "selected";}?>>社會</option>
	</select>
<input type='submit' value='確認'>
</form>
