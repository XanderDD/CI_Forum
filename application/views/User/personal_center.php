<html>
<head>
	<title>King of Glory Forum</title>
	<link rel="stylesheet" type="text/css" href="/CI_Forum/css/nav.css">
	<link rel="stylesheet" type="text/css" href="/CI_Forum/css/user.css">
	<style type="text/css">		
		.f2{
			border:2px solid;
			width:300px;
			height:653px;
			float:left;
			padding: 0;
		}
		.f3{
			border:2px solid;
			width:872px;
			height:633px;
			padding:20px 0px 0px 20px;
			float:left;
		}		
	</style>
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
		<label id="title">Pesonal Center</label><br>
		<label id="date">
			<?php  
				$today=getdate();
				echo "Today'date is ".$today["year"]."/".$today["mon"]."/".$today["mday"];
			?>  
		</div>
		<div class="f2">
			<ul class="nav_ul" style="-webkit-margin-before:0px; -webkit-padding-start: 0px">
				<li><a href='/CI_FORUM/index.php/User/update' style="width: 300px; test-align:left;">Updata My Infomation</a></li>
				<li><a href='/CI_FORUM/index.php/User/showSuggestion' style="width: 300px; test-align:left;">Show My Opinion/Suggestion</a></li>
			</ul>
		</div>
		<div class="f3">
			<?php 
				echo "Name is: ".$result[0]->name."<br>";
				echo "Game Field is: ".$result[0]->game_field."<br>";
				echo "Common Heroes is: ".$result[0]->common_heroes."<br>";
				echo "QQ is: ".$result[0]->qq."<br>";
				echo "Phone is: ".$result[0]->phone;
			?>
		</div>
	</div>
</body>
</html>