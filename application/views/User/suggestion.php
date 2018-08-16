<html>
<head>
	<title>King of Glory Forum</title>
	<link rel="stylesheet" type="text/css" href="/CI_Forum/css/nav.css">
	<link rel="stylesheet" type="text/css" href="/CI_Forum/css/user.css">
</head>
<body>
			
	<div class="navigation">
		<ul class="nav_ul">
			<li><img src="/CI_FORUM/images/log.png"></li>
			<li><a href="/CI_FORUM/index.php/Index/UserHome">Home</a></li>
			<li><a href="/CI_FORUM/index.php/User/game_wallpaper">Game Wallpaper</a></li>
			<li><a href="/CI_FORUM/index.php/User/game_video">Game Video</a></li>
			<li><a href="/CI_FORUM/index.php/User/game_heroes">Hero Show</a></li>
			<li><a href="/CI_FORUM/index.php/User/suggestion">Suggestion</a></li>
			<li><a href="/CI_FORUM/index.php/User/personal_center">Personal Center</a></li>
			<li><a href="/CI_FORUM/index.php/Index/logout">Logout</a></li>
		</ul>
	</div>
	
	<div class="main">
		<div class="f1">
		<label id="title">Suggestion</label><br>
		<label id="date">
			<?php  
				$today=getdate();
				echo "Today'date is ".$today["year"]."/".$today["mon"]."/".$today["mday"];
			?>  
		</div>
		<div class="f2">
			<form method="post" action="/CI_FORUM/index.php/User/addSuggestion">
				Name:<input type="text" name="name" />
				Content:<input type="text" name="content" />
				<input type="submit" name="sbt" value="Submit" />
			</form>
		</div>
	</div>
</body>
</html>