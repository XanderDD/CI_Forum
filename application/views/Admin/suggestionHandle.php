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
	<form method="post" action="/CI_FORUM/index.php/Admin/suggestionHandleDB">
		<input type="hidden" name="opin_id" value="<?php echo $result[0]->opin_id; ?>" />
		Sugg Name:<?php echo $result[0]->opin_name;?><br>
		Content:<?php echo $result[0]->content;?><br>
		Situation:
		<input type="radio" name="situation" value="1" checked="checked" />Processed
		<input type="radio" name="situation" value="2" />Unprocessed<br>
		Note:<input type="text" name="note" value="<?php echo $result[0]->note;?>" /><br>
		<input type="submit" name="sbt" value="Update" />
	</form>
</div>
</body>
</html>