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
				echo "<table border='1px' style='color:#CAE1FF; text-align:center;'>";
				echo "<tr><th>Name</th><th>Content</th><th>Situation</th><th>Note</th></tr>";
				foreach ($result as $v) {
					echo "<tr>";
					echo "<td>$v->opin_name</td>";
					echo "<td>$v->content</td>";
					switch ($v->situation) {
						case 0:
							echo "<td>Watting</td>";
							break;
						
						case 1:
							echo "<td>Processed</td>";
							break;
						case 2:
							echo "<td>Unprocessed</td>";
							break;
					}
					echo "<td>$v->note</td>";
					echo "</tr>";
				}
				echo "</table>";
			?>
		</div>
	</div>
</body>
</html>