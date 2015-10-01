<!DOCTYPE html>

<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>COSMUS</title>
    <?php links() ?>
    
    <!-- Bootstrap -->
    <link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet">
     <link href="<?php echo base_url()?>css/login.css" rel="stylesheet">
     <style>
	body{
		overflow:hidden;
	}
	#container{
	position: relative;
	display: block;
}
	
     	#option{
		/*color: #0099cc;*/
		color: #00FF00;
	}
        #option:hover{
		color: white;
	}
	::-webkit-scrollbar {
    width: 12px;
}
#container:after
{
	width: 100%;
	height: 480%;
	top: 0;
	content:"";
	position: absolute;
background:  url("http://itsmyfun.net/MyFiles/2014/01/A-NEW-wallpapers-HD-2013-serrcs-94.jpg") no-repeat fixed;/*rgba(255, 173, 92, 0.5);*/ /*url("http://wallpaper-download.net/wallpapers/random-wallpapers-tumblr-backgrounds-wallpaper-36963.jpg") repeat fixed;*/
z-index: -1;
opacity:1;
}
#buttonerz:hover{
	background-color: rgba(255,255,19,1) !important;
	border-color: black !important;
}
/* Track */
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
    -webkit-border-radius: 10px;
    border-radius: 10px;
}
 
/* Handle */
::-webkit-scrollbar-thumb {
    -webkit-border-radius: 10px;
    border-radius: 10px;
    background: rgba(255,255,255,0.8); 
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
}
::-webkit-scrollbar-thumb:window-inactive {
	background: rgba(255,0,0,0.4); 
}




     </style>
  </head>
  <body>
	<div id="container">
  
  <?php logo();
	?>	
  <div class="login" >
    <div class="wrapper" >
    <form style="border-radius: 10px; color: white; background-color:black; box-shadow: 5px 5px 5px #00FFFF; border-color: #00FFFF; " class="form-signin" action="http://localhost/cosmus/index.php/main/login_validation" method="post" accept-charset="utf-8">       
      <h2 class="form-signin-heading" style="color: white;">Please login</h2>
	<br>
      <input type="text" class="form-control" name="Email" placeholder="Email Address" value="" required="" autofocus="" /><br>
      <input type="password" class="form-control" name="Password" value="" placeholder="Password" required=""/><br>      
      <label class="checkbox">
        <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
      </label>
      <button class="btn btn-lg btn-primary btn-block" id="buttonerz" style=" background-color:rgba(255,255,19,0.8); font-size:20px; color:black; font-weight:700; border-color:rgb(255,255,19); border-width: 5px;  " type="submit" name="login_submit" value="Login">Login</button><br> 
	<div class="signup"> <a href='<?php echo base_url()."index.php/main/signup" ?>'>create account</a>
	</div>   
    </form>
	
  </div>	
  </div>
  </div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="<?php echo base_url().'js/bootstrap.min.js' ?>"></script>
  
  </body>

</html>



	
