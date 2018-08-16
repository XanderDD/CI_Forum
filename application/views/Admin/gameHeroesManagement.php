<?php
	if(!isset($_SESSION['userID']) || $_SESSION['userID'] != 1){
		header("location:/CI_Forum/index.php");
	}
?>
<html>
<head>
<title>Welcome</title>
<link rel="stylesheet" type="text/css" href="/CI_FORUM/css/Admin.css">
<lin
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
	<?php
		echo "<table border='1px'>";
		echo "<tr><th>Hero Name</th><th>Hero Type</th>
			<th>Viability</th><th>Attack Damage</th><th>Skill Effect</th><th>Difficult Started</th>
			<th colspan='2'>Action</th></tr>";
		//print_r($result);
		foreach ($result as $value) {
			echo "<tr align='center'>";
			echo "<td>$value->heroName</td>";
			switch ($value->heroType) {
				case 1:
					echo "<td>WARRIOR</td>";
					break;	
				case 2:
					echo "<td>MAGE</td>";
					break;
				case 3:
					echo "<td>TANK</td>";
					break;
				case 4:
					echo "<td>ASSASSIN</td>";
					break;
				case 5:
					echo "<td>ARCHER</td>";
					break;
				case 6:
					echo "<td>SUPPORT</td>";
					break;
			}
			echo "<td>$value->viability</td>";
			echo "<td>$value->attackDamage</td>";
			echo "<td>$value->skillEffect</td>";
			echo "<td>$value->difficultStarted</td>";
			echo "<td><a href='".base_url('/Admin/gameHeroesUpdate')."?hero_id=".$value->hero_id."'><button class='button'>Update</button></a></td>";
			echo "<td><a href='".base_url('/Admin/gameHeroesDelete')."?hero_id=".$value->hero_id."'><button class='button'>Delete</button></a></td>";
			echo "</tr>";
		}
		echo "</table>";
		echo "<a href=".base_url('/Admin/gameHeroesAdd').">Add New GameHeroes</a>"
	?>
</div>
</body>
</html>