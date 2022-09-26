<?php
session_start();
if(isset($_COOKIE["id"]) && $_SESSION[$_COOKIE["id"]."_logcheck"]=="true"){
	$id=$_COOKIE["id"];
}
else{
	header("Location:login.php");
}
if(isset($_GET['type']))
	{
		$type=$_GET['type'];
	}
?>
<style type="text/css">
	ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
  background-size: cover;
}
li a {
  display: block;
  color: white;
  text-align: center;
  padding: 18px 22px;
  text-decoration: none;
}
	li {
  float: left;
}
</style>
<link href="article.css" rel="stylesheet" type="text/css">
<!-- <div class='bg'>
</div>
	 -->


	
<title>文章列表</title>
<body >
<div >

	<ul>
	<li><a href="homepage.php"><font size="4">首頁</a></li>
	<li><a href="homepage.php?type=0"><font size="4">公告</a></li>
	<li><a href="homepage.php?type=1"><font size="4">雜項</a></li>
	<li><a href="homepage.php?type=2"><font size="4">數學</a></li>
	<li><a href="homepage.php?type=3"><font size="4">自然</a></li>
	<li><a href="homepage.php?type=4"><font size="4">人文</a></li>
	<li><a href="homepage.php?type=5"><font size="4">社會</a></li>
	
	<span style='float:right'>
<?php
	if($_SESSION[$id."-authority"]=='0')
	{
		echo "<li><a href='admin.php'>管理者介面</a></li>
	";
	}
	elseif(isset($type) && $_SESSION[$id."-authority"]==$type)
	{
		echo "<li><a href='indorse.php?type=".$type."'>討論版檢舉</a></li>
	";
	}
	elseif($_SESSION[$id."-authority"]=='x')
	{
		echo "<li><a href='myrecode.php'>個人紀錄</a></li>
	";
	}

?>
		<li><a href='logout.php'>登出</a></li>
	</span>
	</ul>
</div>

<br>
	<?php
	 // echo $_COOKIE["id"]."<br>";
	 // echo $_SESSION[$id."-authority"]."<br>";
	date_default_timezone_set("Asia/Taipei");
	include("connect.php");
	if(isset($type))
	{
		$SQL="SELECT * FROM paste  WHERE type='$type'";
	}
	else{
		$SQL="SELECT * FROM paste ";
	}

	$result=mysqli_query($con,$SQL);

	echo "<center>";
	while ($row=mysqli_fetch_assoc($result)) {
		echo "<div class='atrticle-box'>";
		echo "<div>";
		echo "<a class='title' href='click.php?art_no=".$row["article_no"]."&click=".$row["click"]."'>".$row["title"]."</a><br>";
		echo $row["ID"]."|".date("Y/m/d H:i:s",$row["timing"]);
	

		echo "<span style='float:right'>";
			if(isset($type))
		{
			 if($_SESSION[$id."-authority"]=='x')
			{
				
				echo "<a href='warning?id=".$row["ID"]."&ano=".$row["article_no"]."&pno=0'>檢舉</a>";
			}
			elseif($_SESSION[$id."-authority"]==$type or $_SESSION[$id."-authority"]=='0')
			{
				echo "<form action='article_delete.php' method='POST'>";
				echo "<input type='hidden' name='art_no' value='".$row["article_no"]."'>";	
				echo "<input type='submit' value='刪除'>";
				echo "</form>";		
				echo "<form action='move.php' method='POST'>";
				echo "<input type='hidden' name='art_no' value='".$row["article_no"]."'>";	
				echo "<input type='submit' value='搬運'>";
				echo "</form>";		
			}
			
		}
		echo "</span>";	
		

		echo "</div>";
		echo "<p style='color: 	gray'>";
		echo mb_strimwidth($row["content"], 0, 50, "...", "UTF-8");
		echo "</p>";
		echo "</div>";
		echo "<br/>";
	}


?>

 <!-- 以下為新增文章 -->



<!-- <?php
// if($_SESSION[$id."-authority"]==$type )
// {
// 	echo "文章分類
// 	<select name='post_type'>
// 	<option value='1'>貼文</option>
// 	<option value='2'>公告</option>
// 	</select><br>";
// }

?> -->
<?php
if(isset($type)){
echo "<div class='atrticle-box'>";
echo "<center><span style='color:white;font-size: 30px;'>新 增 文 章</span></center><br/>";
echo "<form action='article_check.php' method='post'>";
echo "<span style='color:white; font-size:22px; margin-left:30px;'>標題</span><input type='text' class='titletext' required name='title'><br>";
echo "<input type='hidden' name='type' value=".$type.">";
echo "<span style='color:white; font-size:22px; margin-left:30px;'>內文</span>
<textarea class='textarea'  required name='content'></textarea></br>";
echo "<input type='submit' class='button' value='送出'>";
echo "</form>";
}
?>
</div>

</center>


</body>
