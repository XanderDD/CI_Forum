<html>
<head>
	<title>King of Glory Forum</title>
	<link rel="stylesheet" type="text/css" href="/CI_Forum/css/nav.css">
	<link rel="stylesheet" type="text/css" href="/CI_Forum/css/user.css" />
	<style type="text/css">
		.img{
			width: 87px;
			height: 120px;
			float: left;
			margin: 0px 20px;
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
		<label id="title">Heroes</label><br>
		<label id="date">
			<?php  
				$today=getdate();
				echo "Today'date is ".$today["year"]."/".$today["mon"]."/".$today["mday"];
			?>  
		</div> 
		<div class="f2">		
			<?php
				
				foreach ($result as $value) {
					echo "<label class='img'>";
					echo "<a href='/CI_FORUM/index.php/User/heroDetail?hero_id=".$value->hero_id."' target='_blank'><img src=".$value->logURL." width='87px' height='87px'></a>";
					echo "<h4>".$value->heroName."</h4>";
					echo "</label>";
				}	
				

			/*
				$dir = "D:/wamp/www/CI_FORUM/images/heroes/"; 
				if (is_dir($dir)){
					$file = scandir($dir);
					$file = array_diff($file,array('.','..'));
					foreach ($file as $value) {	
						if(substr($value,-3) == "jpg"){											
							$filePath = substr($dir,11).$value;
							$name = substr($value,0,strpos($value,'.'));
							$linkPath = substr($dir,11).$name."/".$name.".html";
							echo "<label class='img'>";
							echo "<a href=".$linkPath." target='_blank'><img src=".$filePath." width='87px' height='87px'></a>";
							echo "<h4>".substr($value,0,strpos($value,'.'))."</h4>";
							echo "</label>";	
						}						
					}
				}*/
			?>
		</div>
	</div>	
</body>
</html>