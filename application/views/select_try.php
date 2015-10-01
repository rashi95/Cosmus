<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Cosmus</title>
      <?php links() ?>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/bootstrap.min.css"/>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/main_page.css"/>
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
         #test1{
         font-weight: bolder;
         background: #faebd7;
         font-size: 2.75vh;	    
         }
         body{
         font-family: Unica One;
         }
         #container{
         border-radius: 10px;
         margin: 3px 3px 3px 3px;
         }
	 .jumbotron
	{
	  width:80%; 
	  position:relative;
	  top:40%;
	  padding-bottom: 10%; 
	  background: white;
	  border-radius:8px;
	  margin-left: 10%;
	  z-index: +1;
	}
	 .jumbotron:after{
          content:'';
          position: absolute;
          top:0;
          width: 112%;
          height: 70%;
          padding: 2% 0 2% 0;
	
	  margin: 6.5% 0 7% -6%;
          z-index: -1;
	  background-color: rgba(255,255,0,0.6) !important;
         color:white !important;
         border-radius: 10px !important;
}
      </style>
      <?php 
         if(strcmp($success,"")==0)
         	{
         echo "<style>
         #test1{
         display : none; 
         }
         </style>";
         }
         else
         {
         echo "<style>
         #test1{
         display : block;
         }
         </style>";
         }
         ?>
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
                  <ul class="nav navbar-nav navbar-right">
                     <li><a style="color:black;" href="<?php echo base_url()."index.php/main/members" ?>" id="option"><b>Home</b> </a></li>
                     <li><a style="color:black;" href="<?php echo base_url().'index.php/leaderboard'?>" id="option"><b>Leaderboard</b></a></li>
                     <li><a  style="color:black;" href="<?php echo base_url().'index.php/main/logout'?>" id="option"><b>Logout</b></a></li>
                  </ul>
               </div>
            </div>
         </nav>
      </div>
      <br/><br/><br/><br/>
      <div class="jumbotron" >
         <div id="test1" class="alert alert-danger">
            <?php echo "Please select some other language/difficulty level"; ?>
         </div>
	 <div id="cont">
      <form method="POST" action="<?php echo base_url()?>index.php/select/choice_made" enctype="multipart/form-data">
         <div class="s_lang">
            <p class="help-block" style="color:black; font-size:2.50vh;"><b>Select language</b></p>
            <select class="form-control" name="ChoiceLang">
               <option value="c">C</option>
               <option value="python">Python</option>
               <option value="javascript">Javascript</option>
            </select>
         </div>
         <div class="s_level">
            <p class="help-block" style="color:black; font-size:2.50vh;"><b>Select level</b></p>
            <select name="choice_lang" class="form-control">
               <option value=1>Easy</option>
               <option value=2>Medium</option>
               <option value=3>Hard</option>
            </select>
         </div>
         <div class="but">
            <button type="submit" class="btn btn-primary btn-lg active">Start</button>
         </div>
      </form>
      </div>
      </div>
      
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
      <script src='<?php echo base_url()."js/bootstrap.min.js" ?>'></script>
   </body>
</html>



