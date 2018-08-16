<html>
<head>
	<title>King of Glory Forum</title>
	<link rel="stylesheet" type="text/css" href="/CI_Forum/css/nav.css">
	<link rel="stylesheet" type="text/css" href="/CI_Forum/css/user.css">
	<style type="text/css">

		.main{
			background:rgba(0,0,0,0.6); 
			width: 1200px; 
			height: 900px; 	
			margin-left: 360px;
			margin-top: 35px; 
			color:#CAE1FF;
		}

		.f2{
			border:2px solid;
			width:1156px;
			height:713px;
			padding: 20px;
			float:left;
		}
		.f2 h4{
			width: 346.8px;
			text-align: center;
			margin-top: 10px;
		}

		
		.img{
			width: 384px;
			height: 240px;
			float: left;
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
		<label id="title">HD Wallpaper</label><br>
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
						echo "<a href=".$value->wpURL." target='_blank'><img src=".$value->wpURL." width='346.8px' height='183.89px'></a>";
						echo "<h4>".$value->wpName."</h4>";
						echo "</label>";
				}

			/*
				$dir = "D:/wamp/www/CI_FORUM/images/wallpaper/";  //要获取的目录
				 
				//先判断指定的路径是不是一个文件夹
				if (is_dir($dir)){
					$file = scandir($dir);
					$file = array_diff($file,array('.','..'));
					foreach ($file as $value) {
						$filePath = substr($dir,11).$value;	//改为绝对路径		
						echo "<label class='img'>";
						echo "<a href=".$filePath." target='_blank'><img src=".$filePath." width='346.8px' height='183.89px'></a>";
						echo "<h4>".substr($value,0,strpos($value,'.'))."</h4>";
						echo "</label>";
					}
				}
				*/
			?>
		</div>
	</div>	
</body>
</html>