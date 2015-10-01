<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cosmus</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/main_page.css"/>
    <?php links(); ?>
    <style>
	body{
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
       <li><a style="color:black; background-color: black; border-bottom-right-radius: 700px; border-bottom-left-radius: 700px; color:white; font-size: 20px;"><b>Welcome <?php echo $username; ?></b></a></li>
	</ul>
      <ul class="nav navbar-nav navbar-right" style=" font-family: Unica One;">
	 <li><a style="color:black;" href="<?php echo base_url()."index.php/select/" ?>" id="option"><b>Play Game</b> </a></li>
       <li><a style="color:black;" href="<?php echo base_url().'index.php/leaderboard'?>" id="option"><b>Leaderboard</b></a></li>
	<li><a style="color:black;" href="<?php echo base_url().'index.php/main/logout'?>" id="option"><b>Logout</b></a></li>		
      </ul>
    </div>
  </div>
</nav>
       </div>

<h1 class="header" id="welcome" style="color:white; font-family: Unica One; font-weight: 900;">Past performance </h1>
<div id="members" style="border: 7px solid; border-radius:10px; border-color: grey; font-family: Unica One; font-weight: 600; font-size: medium; margin-left: 10%; "  >
	<?php
	//echo $username."<br>";
	$email = $this->session->userdata['Email'];
	$query = $this->db->get($username);
	//echo $this->table->generate($query);
	echo "<table class='table table-striped'>";
	echo "<thead style='color:#5CD6FF;'><tr><th>Codes Reviewed</th><th>Language</th><th>Difficulty</th><th>Score</th></tr></thead>";
	?>
	
	<?php
	echo "<tbody>";
	foreach ($query->result() as $row)
	{
		echo "<tr><th>".$row->Codes_Reviewed."</th><th>".$row->Language."</th><th>".$row->Difficulty."</th><th>".$row->Score."</th></tr>";
	}
	echo "</tbody></table>"
	?>
</div>
	
 

</body>
</html>
