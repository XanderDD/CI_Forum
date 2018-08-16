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
	<form method="post" action="<?php echo base_url('/Admin/gameHeroesUpdateDB'); ?>">
		<input type="hidden" name="hero_id" value="<?php echo $result[0]->hero_id; ?>" />
		Hero Name:<input type="text" name="heroName" value="<?php echo $result[0]->heroName;?>" /><br>
		Hero Type:
		<select name="heroType">
			<?php
				switch ($result[0]->heroType) {
					case 1:
						echo "<option value='1' selected='selected'>WARRIOR</option>
							<option value='2'>MAGE</option>
							<option value='3'>TANK</option>
							<option value='4'>ASSASSIN</option>
							<option value='5'>ARCHER</option>
							<option value='6'>SUPPORT</option>";
						break;
					
					case 2:
						echo "<option value='1'>WARRIOR</option>
							<option value='2' selected='selected'>MAGE</option>
							<option value='3'>TANK</option>
							<option value='4'>ASSASSIN</option>
							<option value='5'>ARCHER</option>
							<option value='6'>SUPPORT</option>";
						break;
					case 3:
						echo "<option value='1''>WARRIOR</option>
							<option value='2'>MAGE</option>
							<option value='3' selected='selected>TANK</option>
							<option value='4'>ASSASSIN</option>
							<option value='5'>ARCHER</option>
							<option value='6'>SUPPORT</option>";
						break;
					case 4:
						echo "<option value='1'>WARRIOR</option>
							<option value='2'>MAGE</option>
							<option value='3'>TANK</option>
							<option value='4' selected='selected'>ASSASSIN</option>
							<option value='5'>ARCHER</option>
							<option value='6'>SUPPORT</option>";
						break;
					case 5:
						echo "<option value='1'>WARRIOR</option>
							<option value='2'>MAGE</option>
							<option value='3'>TANK</option>
							<option value='4'>ASSASSIN</option>
							<option value='5' selected='selected'>ARCHER</option>
							<option value='6'>SUPPORT</option>";
						break;
					case 6:
						echo "<option value='1'>WARRIOR</option>
							<option value='2'>MAGE</option>
							<option value='3'>TANK</option>
							<option value='4'>ASSASSIN</option>
							<option value='5'>ARCHER</option>
							<option value='6' selected='selected'>SUPPORT</option>";
						break;
				}
			?>
		</select><br>
		Viability:<input type="text" name="viability" value="<?php echo $result[0]->viability;?>" /><br>
		Attack Damage:<input type="text" name="attackDamage" value="<?php echo $result[0]->attackDamage;?>" /><br>
		Skill Effect:<input type="text" name="skillEffect" value="<?php echo $result[0]->skillEffect;?>" /><br>
		Difficult Started:<input type="text" name="difficultStarted" value="<?php echo $result[0]->difficultStarted;?>" />
		<br><input type="submit" name="sbt" value="Update" />
	</form>
</div>
</body>
</html>