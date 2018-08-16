<html lang="en">
 <head>
  <title>Register</title>
  <style>
  	body {                                
        overflow: hidden;
        position: fixed;
        width:100%;
        height:100%;
        background: url("/CI_FORUM/images/register.jpg") no-repeat;
        background-size:cover;
	}   
	.register{
		border:1px solid ;
		border-radius: 15px;
		width:400px;
		height:800px;
		float:right;
		margin:80px 200px 0px 0px;
		background-color:rgba(258,258,258,1);
	}
	#title{
		text-align:center;
		display:block;
		font:25px bold;
		margin:20px 0px 20px 0px;
	}
	#error{
		border:1px solid;
		text-align:center;
		width:400px;
		height:50px;
		font-size:20px;
		color:red;
	}
	#name_pasd{
		display:block;
		font:20px bold;
		margin:25px 15px 10px 20px;
		float:left;
	}
	input[type=text],input[type=password],input[type=date],input[type=textarea]{
		border-radius: 5px;
		display:block;
		font-size:20px;
		width:240px;
		height:40px;
		margin:30px 20px 10px 0px;
		padding:10px;
		background-color:rgba(258,258,258,1);
	}
	input[type=radio]{
	margin:30px 10px 20px 10px;
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
		margin:80px 0px 0px 120px;
	}
  </style>
 </head>
 <body>
 <form name="register" method="post" action="<?php echo base_url('Index/register');?>">
 <div class="register">
  <label id="title">Please fill in the details</label><hr>
	<?php
		if(isset($err)){
			switch ($err) {
				case 1:
					echo "<div id='error'>Username/Password/Confirm<br>Password/Name is null</div>";
					break;

				case 2:
					echo "<div id='error'>Password and Confirm Password unequal!!!</div>";	
					break;
				
				case 3:
					echo "<div id='error'>Insert falied!</div>";
					break;
			}
		}
	?>

  <label id="name_pasd"><span style="color:red">*</span>Username:</label>
  <input type="text" name="usernameTxt" />
  <label id="name_pasd"><span style="color:red">*</span>Password:</label>
  <input type="password" name="pasdTxt1" />

  <label id="name_pasd" style="margin:15px 15px 10px 30px;"><span style="color:red">*</span>Confirm<br>Password:</label>
  <input type="password" name="pasdTxt2" /><br>

  <label id="name_pasd" style="margin:5px 15px 10px 55px;"><span style="color:red">*</span>Name:</label>
  <input type="text" style="margin:0px 15px 10px 25px;" name="nameTxt" />

  <label id="name_pasd" style="margin:25px 10px 0px 20px;">Game Field:</label>
  <input type="text" name="game_field" />

  <label id="name_pasd" style="margin:10px 15px 0px 38px;">Common<br>Heroes:</label>
  <input type="text" name="common_heroes" />

  <label id="name_pasd" style="margin:25px 15px 0px 90px;">QQ:</label>
  <input type="text" name="QQ" />
  
  <label id="name_pasd" style="margin:10px 15px 0px 42px;">Phone<br>Number:</label>
  <input type="text" name="phone_number" />

  <input type="submit" name="sbt" value="Register" />
  <a id="link" href="/CI_FORUM/index.php/Index/login">Click here for login</a>
 </div>
 </body>
</html>
