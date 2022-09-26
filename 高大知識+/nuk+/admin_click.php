<?php
if(isset($_COOKIE["id"]) && $_SESSION[$_COOKIE["id"]."_logcheck"]=="true"){
	$id=$_COOKIE["id"];
	if($_SESSION[$id."-authority"]==0)
	{}
	else
	{
		header("Location:homepage.php");
	}
}
else{
	header("Location:login.php");
}
?>
<style type="text/css">
	ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
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



<div class='atrticle-box' style="margin-left: 27%;width: 700px">
<center>
	<h2>各版點閱率</h2>
<?php
$total='0';
$type_click=array('0','0','0','0','0','0');
$type=array(
	'公告',
	'雜項',
	'數學',
	'自然',
	'人文',
	'社會'
);
for($i=0;$i<6;$i++)
{
	$SQL="SELECT * FROM paste WHERE type='$i'";
	$result=mysqli_query($con,$SQL);
	while($row=mysqli_fetch_assoc($result))
	{
		$type_click[$i]+=$row["click"];
	}

}

for($i=0;$i<6;$i++)
{
	$total+=$type_click[$i];
}

echo "<script type='text/javascript' src='https://www.gstatic.com/charts/loader.js'></script>
  <script type='text/javascript'>
    google.charts.load('current', {packages:['corechart']});
    google.charts.setOnLoadCallback(drawChart);
    function drawChart() {
      var data = google.visualization.arrayToDataTable([
        ['討論版', '版點閱數', { role: 'style' } ],
        ['".$type[0]."', ".(float)($type_click[0]/$total).", '#b87333'],
        ['".$type[1]."', ".(float)($type_click[1]/$total).", 'silver'],
        ['".$type[2]."', ".(float)($type_click[2]/$total).", 'gold'],
        ['".$type[3]."', ".(float)($type_click[3]/$total).", 'color: #e5e4e2'],
        ['".$type[4]."', ".(float)($type_click[4]/$total).", 'color: #e5e4e2'],
        ['".$type[5]."', ".(float)($type_click[5]/$total).", 'color: #e5e4e2'],
      ]);

      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: 'stringify',
                         sourceColumn: 1,
                         type: 'string',
                         role: 'annotation' },
                       2]);

      var options = {
        title: '',
        width: 600,
        height: 400,
        bar: {groupWidth: '95%'},
        legend: { position: 'none' },
      };
      var chart = new google.visualization.ColumnChart(document.getElementById('columnchart_values'));
      chart.draw(view, options);
  }
  </script>
<div id='columnchart_values' style='width: 600px; height: 330px;'></div>";



?>
</center>
<br>
<br>
<br>
<center>
<h2>各版文章點閱率排行</h2>
</center>

<ul  style='background-color:#FDFFFF;height:50px;'>
<li style='padding: 14px;width:20%;margin: auto;text-align:center'>討論版</li>
<li style='padding: 14px;width:20%;margin: auto;text-align:center'>排名</li>
<li style='padding: 14px;width:30%;margin: auto;text-align:center'>標題</li>
<li style='padding: 14px;width:10%;margin: auto;text-align:center'>點閱數</li>
</ul>
<div style='border-bottom-style:solid;height: 1px'> </div>

<?php


for($i=0;$i<6;$i++)
{
	$click=array(
		'0',
		'0',
		'0'
	);
	$no=array(
		'',
		'',
		''
	);
	$SQL="SELECT * FROM paste WHERE type='$i' AND post_no='0'";
	$result=mysqli_query($con,$SQL);
	while($row=mysqli_fetch_assoc($result)) 
	{
		if($row["click"]>$click[0])
		{
			$click[0]=$row["click"];
			$no[0]=$row["No"];	
		}		
	}

	while($row=mysqli_fetch_assoc($result)) 
	{
		if($row["click"]>$click[1] && $row["click"]<$click[0])
		{
			$click[1]=$row["click"];
			$no[1]=$row["No"];	
		}		
	}

	while($row=mysqli_fetch_assoc($result)) 
	{
		if($row["click"]>$click[2] && $row["click"]<$click[1])
		{
			$click[2]=$row["click"];
			$no[2]=$row["No"];	
		}		
	}
	for($j=0;$j<3;$j++)
	{
		$k=$j+1;
		if($no[$j]!='')
		{
		$SQL="SELECT * FROM paste WHERE No='$no[$j]' ";
		$result=mysqli_query($con,$SQL);
		$row=mysqli_fetch_assoc($result);
		echo "<ul  style='background-color:#FDFFFF;height:50px;'>";
		echo "<li style='padding: 14px;width:20%;margin: auto;text-align:center'>".$type[$i]."</li>";
		echo "<li style='padding: 14px;width:20%;margin: auto;text-align:center'>".$k."</li>";
		echo "<li style='padding: 14px;width:30%;margin: auto;text-align:center'>
			<a style='color: black;' href=article.php?art_no=".$row["article_no"].">
			".$row["title"]."
			</a>
			</li>";
		echo "<li style='padding: 14px;width:10%;margin: auto;text-align:center'>".$row["click"]."</li>";
		echo "</ul>";
		echo "<div style='border-bottom-style:solid;height: 1px'> </div>";
		}
		else
		{
			echo "<ul  style='background-color:#FDFFFF;height:50px;'>
				<li style='padding: 14px;width:20%;margin: auto;text-align:center'>".$type[$i]."</li>
				<li style='padding: 14px;width:20%;margin: auto;text-align:center'>".$k."</li>
				<li style='padding: 14px;width:30%;margin: auto;text-align:center'>x</li>
				<li style='padding: 14px;width:10%;margin: auto;text-align:center'>x</li>
				</ul>
				<div style='border-bottom-style:solid;height: 1px'> </div>";
		}
	}
	if($i<5)
	echo "<ul  style='background-color:#FDFFFF;height:50px;'></ul>
				<div style='border-bottom-style:solid;height: 1px'> </div>";
}
?>
</div>