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
	<h3>
		<font color="red"><?php if(isset($error)){ print_r($error); } ?></font><br>
		First:You must confirm the picture and video are same.<br>
		Second:The files Name is true!
	</h3>
	<form method="post" action="/CI_FORUM/index.php/Admin/gameHeroesAddDB" enctype="multipart/form-data">
		Hero Name:<input type="text" name="heroName" /><br>
		Hero Type:
		<select name="heroType">
			<option value="1">WARRIOR</option>
			<option value="2">MAGE</option>
			<option value="3">TANK</option>
			<option value="4">ASSASSIN</option>
			<option value="5">ARCHER</option>
			<option value="6">SUPPORT</option>
		</select><br>
		Viability:<input type="text" name="viability" /><br>
		Attack Damage:<input type="text" name="attackDamage" /><br>
		Skill Effect:<input type="text" name="skillEffect" /><br>
		Difficult Started:<input type="text" name="difficultStarted" /><br>
		Main Log:<input type="file" name="logURL" /><br>
		Log1:<input type="file" name="log1" /><br>
		Log2:<input type="file" name="log2" /><br>
		Background1:<input type="file" name="bg1" /><br>
		Background2:<input type="file" name="bg2" /><br>
		<input type="submit" name="sbt" />
	</form>
</div>
</body>
</html>