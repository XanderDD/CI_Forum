<html>
<head>
	<title>King of Glory Forum</title>
	<style type="text/css">
		body{
			margin: 0px;
			background: url("<?php echo $result[0]->bg1; ?>") no-repeat;		
		}		
	</style>
	<link rel="stylesheet" type="text/css" href="/CI_FORUM/css/nav.css" />
	<link rel="stylesheet" type="text/css" href="/CI_FORUM/css/hero.css" />
	<script type="text/javascript">
        function myClick(num) {  
            var div1 = document.getElementById('d1'); 
            var div2 = document.getElementById('d2');
            if(num==1){
                div1.setAttribute("class", "curr");
                div2.setAttribute("class", "");
                document.body.style.background = "url('<?php echo $result[0]->bg1; ?>')";
            }else{
                div1.setAttribute("class", "");
                div2.setAttribute("class", "curr");
                document.body.style.background = "url('<?php echo $result[0]->bg2; ?>')";
            }    
        }    
    </script>
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
	<div class="cover">
        <h1><?php echo $result[0]->heroName; ?></h1>
        <span class="herodetail-sort"><i class="herodetail-sort-<?php echo $result[0]->heroType; ?>"></i></span>                           
        <ul class="cover-list">
            <li>
                <em style="font-size: 20px">Viability</em><br>
                <div class="cover-list-bar data-bar1 fl"><b class="icon"></b><i class="ibar" style="width:<?php echo $result[0]->viability; ?>%"></i></div>
            </li>
            <li>
                <em style="font-size: 20px">Attack Damage</em><br>
                <div class="cover-list-bar data-bar2 fl"><b class="icon"></b><i class="ibar" style="width:<?php echo $result[0]->attackDamage; ?>%"></i></div>
            </li>
            <li>
                <em style="font-size: 20px">Skill Effect</em><br>
                <div class="cover-list-bar data-bar3 fl"><b class="icon"></b><i class="ibar" style="width:<?php echo $result[0]->skillEffect; ?>%"></i></div>
            </li>
            <li>
                <em style="font-size: 20px">Difficult Started</em><br>
                <div class="cover-list-bar data-bar4 fl"><b class="icon"></b><i class="ibar" style="width:<?php echo $result[0]->difficultStarted; ?>%"></i></div>
            </li>
        </ul>
    </div>
    <div class="pic-pf">
        <ul class="pic-pf-list pic-pf-list3">
        	<li>
        		<i id="d1" class="curr" onclick="myClick(1)">
        			<img src="<?php echo $result[0]->log1; ?>" />
        		</i>

        	</li>
        	<li>
        		<i id="d2" class="" onclick="myClick(2)">
        			<img src="<?php echo $result[0]->log2; ?>" />
        		</i>
        	</li>
        </ul>
    </div>
		
</body>
</html>