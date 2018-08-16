<html lang="en">
 <head>
  <title>Login</title>
  <style>
  	body {                                
        overflow: hidden;
        position: fixed;
        width:100%;
        height:100%;
        background: url("/CI_FORUM/images/home.jpg") no-repeat;
        background-size:cover;
	}      
	.login{
		border:1px solid ;
		border-radius: 10px;
		width:400px;
		height:360px;
		margin:330px 0px 0px 300px;
		background-color:white;
	}
	#title{
		text-align:center;
		display:block;
		font:25px bold;
		margin:20px 0px 0px 0px;
	}
	#success{
		border:1px solid;
		padding:10px 30px 10px 25px;
		text-align:center;
		font-size:20px;
		color:#01B468;
	}
	#error{
		border:1px solid;
		padding:10px 30px 10px 25px;
		text-align:center;
		font-size:20px;
		color:red;
	}
	#name_pasd{
		display:block;
		font:20px bold;
		margin:15px 10px 0px 25px;
		float:left;
	}
	input[type=text],input[type=password]{
		border-radius: 5px;
		display:block;
		font-size:20px;
		width:240px;
		height:40px;
		margin:20px 0px 10px 0px;
		padding:10px;
	}
	input[type=submit]{
		border-radius: 5px;
		display:block;
		font-size:20px;
		width:100px;
		height:45px;
		margin:15px 20px 0px 40px;
		padding:10px;
		float:right;
		background-color:#01B468;
	}
	#link{
		display:block;
		margin:80px 0px 0px 150px;
	}
  </style>
 </head>
 <body>
 <div class="login">
 <form name="loginForm" method="post" action="<?php echo base_url('Index/login');?>" >
  <label id="title">Sign IN</label><hr>
  <?php
		if(isset($err)){
			switch ($err) {
				case -1:
					echo "<div id='success'>Registration successful.Please login.</div>";
					break;

				case 1:
					echo "<div id='error'>Username or Password can't null!</div>";	
					break;
				
				case 2:
					echo "<div id='error'>Username or Password mistake!</div>";
					break;
			}
		}
  ?>
  <label id="name_pasd">Username:</label>
  <input type="text" name="username" id="username" />
  <label id="name_pasd">Password:</label>
  <input type="password" name="password" id="password" />
  <input type="submit" name="sbt" value="Login" />
  <a id="link" href="/CI_FORUM/index.php/Index/register">Register click here</a>
 </form>
 </div>
 </body>
</html>
