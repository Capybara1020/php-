<style type="text/css">
table{
	width: 100%;
	height: 20px;
}
td a{
	line-height:10px;
	background-color: #ECFFFF;
	border-radius: 4px;
	padding: 4px 8px;
	color: white;
	text-align: center;
	color: black;
	cursor: pointer;
	text-decoration: none;
}
</style>
<?php
$SQL="SELECT * FROM evaluation WHERE ID='$id' AND article_no='$art_no' AND post_no='$post_no'";
if($result=mysqli_query($con,$SQL))
{
	echo "
	<table >
		<tr >  
			<td><a href='rank_check.php?score=1&ano=".$art_no."&pno=".$post_no."&a=1'>超爛欸</a></td>
			<td><a href='rank_check.php?score=2&ano=".$art_no."&pno=".$post_no."&a=1'>有點爛</a></td>
			<td><a href='rank_check.php?score=3&ano=".$art_no."&pno=".$post_no."&a=1'>普普的</a></td>
			<td><a href='rank_check.php?score=4&ano=".$art_no."&pno=".$post_no."&a=1'>不錯喔</a></td>
			<td><a href='rank_check.php?score=5&ano=".$art_no."&pno=".$post_no."&a=1'>好棒棒</a></td>
		</tr>
	</table>";
}
else
{
	echo "
	<table >
	<tr>  
			<td><a href='rank_check.php?score=1&ano=".$art_no."&pno=".$post_no."&a=0'>超爛欸</a></td>
			<td><a href='rank_check.php?score=2&ano=".$art_no."&pno=".$post_no."&a=0'>有點爛</a></td>
			<td><a href='rank_check.php?score=3&ano=".$art_no."&pno=".$post_no."&a=0'>普普的</a></td>
			<td><a href='rank_check.php?score=4&ano=".$art_no."&pno=".$post_no."&a=0'>不錯喔</a></td>
			<td><a href='rank_check.php?score=5&ano=".$art_no."&pno=".$post_no."&a=0'>好棒棒</a></td>
		</tr>
	</table>";
}
?>
