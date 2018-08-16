<?php
	if(!isset($_SESSION['userID']) || $_SESSION['userID'] != 1){
		header("location:/CI_Forum/index.php");
	}
?>
<html>
<head>
<title>Welcome</title>
<link rel="stylesheet" type="text/css" href="/CI_FORUM/css/Admin.css">
</head>
<body>
<div class="f1">
	<label id="title">King Of Glory Management System</label><br>
	<label id="date">
		<?php  
			$today=getdate();
			echo "Today'date is ".$today["year"]."/".$today["mon"]."/".$today["mday"];
		?>  
	</label><label id='logout'>Welcome Admin, <a href='/CI_FORUM/index.php/Index/logout'>Logout</a></label>
</div>
<div class="f2">
	<ul class="ul" style="-webkit-margin-before:0px; -webkit-padding-start: 0px">
		<li><a href='/CI_FORUM/index.php/Admin/home'>Home</a></li>
		<li><a href='/CI_FORUM/index.php/Admin/userManagement'>User Management</a></li>
		<li><a href='/CI_FORUM/index.php/Admin/suggestionManagement'>Suggestion Management</a></li>
		<li><a href='/CI_FORUM/index.php/Admin/wallpaperManagement'>Wallpaper Management</a></li>
		<li><a href='/CI_FORUM/index.php/Admin/gameVideoManagement'>GameVideo Management</a></li>
		<li><a href='/CI_FORUM/index.php/Admin/gameHeroesManagement'>GameHeroes Management</a></li>
	</ul>
</div>

<div class="f3">
	<frameset>
		<frame >
			<?php
				echo "<table border='1px'>";
				echo "<tr><th>UserCount</th><th>OpinionCount</th><th>HeroCount</th></tr>";
				echo "<tr align='center'>";
				foreach ($result as $value) {
					echo "<td>$value</td>";
				}
				echo "</tr></table>";
			?>
		</frame>
	</frameset>
</div>
<!--
<div class="f3">
	<?php/*
		echo "<table border='1px'>";
		echo "<tr><th>UserCount</th><th>OpinionCount</th><th>HeroCount</th></tr>";
		echo "<tr align='center'>";
		foreach ($result as $value) {
			echo "<td>$value</td>";
		}
		echo "</tr></table>";*/
	?>
</div>
-->
</body>
</html>