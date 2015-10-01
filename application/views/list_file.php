<!DOCTYPE html>
    <html>
	<head>
	    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cosmus</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/bootstrap.min.css"/>
    
    <?php links(); ?>
    	<!-- buttons in navbar: home(linking to adminpage), logout -->
     <style>
	body{
	    font-family: Unica One;
	background:  url("http://itsmyfun.net/MyFiles/2014/01/A-NEW-wallpapers-HD-2013-serrcs-94.jpg") no-repeat fixed;

      }
    	#option{
		color: #0099cc;
	}
        #option:hover{
		color: white;
	}
	#navigation{
         position: relative;
         display: block;
         }
         #navigation:after{
         width:100%;
         height:100%;
         top: 0;
         content:"";
         position: absolute;
         background:  url("http://www.seamlesspatternchecker.com/hash/seamless-pattern-samples/d/d/9/dd9-vector-abstract-circuit-board-black-and-white-seamless-pattern-geometric-lined-vector-background-151743344.jpg") no-repeat fixed;/*rgba(255, 173, 92, 0.5);*/ /*url("http://wallpaper-download.net/wallpapers/random-wallpapers-tumblr-backgrounds-wallpaper-36963.jpg") repeat fixed;*/
         background-size: 100% 50%;
         border-bottom-right-radius: 500px;
         border-bottom-left-radius: 500px;
         z-index: -1;
         opacity:1;
         }
	 a:hover{
         background-color: black !important;
         border-bottom-right-radius: 700px;
         border-bottom-left-radius: 700px;
         color:white !important;
         }
	  thead{
		font-size: 25px;
	 }
	 tbody{
		color:#FF3300;
	 }
         
	::-webkit-scrollbar {
    width: 12px;
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
::webkit-scrollbar-button:single-button



#crs{
color:white;
position:absolute;
left:10%;
top:20%;
width:80%;    
}
#py{
color:white;
background-color:black;
position:absolute;
left:10%;
top:80%;
width:80%;
}
#js{
color:white;
background-color:black;
position:absolute;
left:10%;
top:140%;
width:80%;    
}
#section1{
color:white;
    width:33%;
    height:300px;
    float:left;
     padding:10px;
	border: 5px solid gray;
    margin: 0;
    overflow: auto;	 	 
}
#section2 {
color:white;
    width:33%;
    height:300px;
    float:left;
     padding:10px;
	border: 5px solid gray;
    margin: 0;
    overflow: auto;	 	 
}
#section3 {
color:white;
    width:33%;
    height:300px;
    float:left;
     padding:10px;
	border: 5px solid gray;
    margin: 0;

    overflow: auto;	 	 
}



   

</style>
</head>
	<body>
	     <div id="navigation" style="border-bottom-right-radius: 700px; border-bottom-left-radius: 700px;">
         <nav class="navbar navbar-inverse" role="navigation" style="border-bottom-right-radius: 700px; border-bottom-left-radius: 700px; background-color: rgba(255,163,19,0.9) ; font-size:17px; font-family: Unica One;">
        <div class="container-fluid">

    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>

   
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
	<li><a style="color:black; background-color: black; border-bottom-right-radius: 700px; border-bottom-left-radius: 700px; color:white; font-size: 20px;"><b>Welcome Admin</b></a></li>

	</ul>
      <ul class="nav navbar-nav navbar-right" style=" font-family: Unica One;">
	    <li><a style="color:black;" href="<?php echo base_url()."index.php/upload/" ?>" id="option"><b>Admin panel</b> </a></li>
	 <li><a style="color:black;" href="<?php echo base_url()."index.php/select/" ?>" id="option"><b>Play Game</b> </a></li>
       <li><a style="color:black;" href="<?php echo base_url().'index.php/leaderboard'?>" id="option"><b>Leaderboard</b></a></li>
	<li><a style="color:black;" href="<?php echo base_url().'index.php/main/logout'?>" id="option"><b>Logout</b></a></li>		
      </ul>
    </div>
  </div>
</nav>
 </div>
	
	<h1 style="color:white; position:absolute; left:10%; top:10%;" >C</h1>

		<div id="crs" style="position:absolute; left:10%; width:80%; top:20%; background-color:black;">
	
		<div id="section1">
		<h2>Easy</h2>
	
		<?php if (count($ce)!=0): ?>
		<?php foreach($ce as $index=>$file): ?>
		<?php ++$index ?>
			<p><?php echo $index.". ".$file ?> </p><br>
		<?php endforeach; ?>
		<?php endif;?>		
		</div>
		
		
		<div id="section2">
		<h2>Medium</h2>
		<?php if (count($cm)!=0): ?>
		<?php foreach($cm as $index=>$file): ?>
		<?php ++$index ?>
			<p><?php echo $index.". ".$file ?> </p><br>		
		<?php endforeach; ?>
		<?php endif; ?>
		</div>
		
		
		
	    <div id="section3">
		<h2>Hard</h2>
		<?php if (count($cd)!=0): ?>
		<?php foreach($cd as $index=>$file): ?>
		<?php ++$index ?>
			<p><?php echo $index.". ".$file ?> </p><br>
		<?php endforeach; ?>
		<?php endif; ?>
		</div>
		</div>
		
	    
		<h1 style="color:white; position:absolute; top:70%; left:10%;">Python</h1>
		
		<div id="py">

		<div id="section1">
		<h2>Easy</h2>
		<?php if (count($pye)!=0): ?>
		<?php foreach($pye as $index=>$file): ?>
		<?php ++$index ?>
			<p><?php echo $index.". ".$file ?> </p><br>
		<?php endforeach; ?>
		<?php endif; ?>
		</div>
		
		<div id="section2">
		<h2>Medium</h2>
		<?php if (count($pym)!=0): ?>
		<?php foreach($pym as $index=>$file): ?>
		<?php ++$index ?>
			<p><?php echo $index.". ".$file?> </p><br>
		<?php endforeach; ?>
		<?php endif; ?>
		</div>
				<div id="section3">

		<h2>Hard</h2>
		<?php if (count($pyd)!=0): ?>
		<?php foreach($pyd as $index=>$file): ?>
		<?php ++$index ?>
			<p><?php echo $index.". ".$file ?> </p><br>
		<?php endforeach; ?>
		<?php endif; ?>
		</div>
	</div>
	
	

		<h1 style="color:white; position:absolute; top:130%; left:10%;">Javascript</h1>
		
		<div id="js">

		<div id="section1">
		<h2>Easy</h2>
		<?php if (count($jse)!=0): ?>
		<?php foreach($jse as $index=>$file): ?>
		<?php ++$index ?>
			<p><?php echo $index.". ".$file ?> </p><br>
		<?php endforeach; ?>
		<?php endif; ?>
		</div>
		
		
		<div id="section2">
		<h2>Medium</h2>
		<?php if (count($jsm)!=0): ?>		
		<?php foreach($jsm as $index=>$file): ?>
		<?php ++$index ?>
			<p><?php echo $index.". ".$file ?> </p><br>
		<?php endforeach; ?>
		<?php endif; ?>
		</div>
		

	    <div id="section3">

		<h2>Hard</h2>
		<?php if (count($jsd)!=0): ?>
		<?php foreach($jsd as $index=>$file): ?>
		<?php ++$index ?>
			<p><?php echo $index.". ".$file ?> </p><br>
		<?php endforeach; ?>
		<?php endif; ?>
		</div>
		
		
    </body>
    </html>			
