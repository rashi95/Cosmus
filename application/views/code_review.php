<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<title>Member Page</title>
	<link href="<?php echo base_url()?>css/bootstrap.min.css" rel="stylesheet">	
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

	<link href='http://fonts.googleapis.com/css?family=Unica+One' rel='stylesheet' type='text/css'>

	<script src='<?php echo base_url()."js/bootstrap.min.js" ?>'></script>
	<script src='<?php echo base_url()."js/bootbox.min.js" ?>'></script>

	<!--<script src='<?php echo base_url()."js/jquery-1.11.1.min.js" ?>'></script>
	<script src='<?php echo base_url()."js/jquery-2.1.1.min.js" ?>'></script>-->
	<script>
		var controller = 'ajax_sample';
		var base_url = '<?php echo base_url()."index.php" ?>';
		var no_of_bugs = '<?php echo $no_of_bugs ?>';
		function load_data_ajax(line_number,bug_type,priority_level)
		{
			$.ajax({
					'url' : base_url + '/' + controller + '/update_db',
					'type' : "post",
					'data' : { 'line_number' : line_number, 'bug_type' : bug_type, 'priority_level' : priority_level},
					'success' : function(data) {
					}
				});
			//alert(base_url);
		}
		function remove_data_ajax(line_number,bug_type,priority_level)
		{
			$.ajax({
					'url' : base_url + '/' + controller + '/delete_db',
					'type' : "post",
					'data' : { 'line_number' : line_number, 'bug_type' : bug_type, 'priority_level' : priority_level},
					'success' : function(data) {
					}
				});
		}
		function get_hint_ajax()
		{
			$.ajax({
					'url' : base_url + '/' + controller + '/get_hint',
					'type' : "post",
					'dataType' : "text",
					'success' : function(data) {
					display(data);
					}
					});
		}
		$(document).ready(function() {
		          setInterval(function()
		{
			$.ajax({
					'url' : base_url + '/' + controller + '/get_mark',
					'type' : "post",
					'dataType' : "text",
					'success' : function(data) {
						
						comment = "";
						if(data == no_of_bugs)
							comment = "Outstanding, You have already found all the bugs!!!";
						else if(data >= (3*no_of_bugs)/4)
							comment = "You have correctly found " + data + " bugs. You are on the right track .....just some more thinking is required :)";
						else if(data >=no_of_bugs/2)
							comment = "You have found " + data + " bugs correctly. Just some more thinking and you can do wonders...";
						else if(data!=0 && data !=1)	
							comment = "You have found " + data + " bugs correctly. Focus man...";
						else if(data==1)	
							comment	= "Just 1 correct bug... wat r u doing...pull up your socks and go for it";
						else
							comment = "Seems as if someone has forced you to play the game, not a single correct bug till now :(";	
						//alert(comment);	
						bootbox.dialog({
							message: comment,
							buttons: {
							main: {
							label: "Ok",
							className: "btn-primary",
							}
							}
						});
					}
			});
		}
		,60000);
	         });          
			
        			
		

		
	</script>
	<meta name="viewport" content="width=1024, initial-scale=1, minimum-scale: 1, maximum-scale: 1">
	<script src='<?php echo base_url()."js/code_review.js" ?>'></script>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/code_review.css"/>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/prism.css"/>
<style>
   
pre[class*="language-"] {
    margin: 0;
    padding-top: 0;
    padding-bottom: 0;
    box-shadow: none;
    border: 0;
    border-radius: 0;
    position: relative;
    
}
code[class*="language-"], pre[class*="language-"] {
    word-wrap: break-word;
    -moz-word-wrap: break-word;
}
@media all and (max-width: 750px) { .code-container { width: 100%; height: 100%; margin: 2% 2% 2% 2%;} }
.code-container {
    
    position: relative;
    margin: 5% 0 0 13%;
    padding: 0.5%;
    overflow: visible;
    background-color: #141414;
    width: 75%;
    border-radius: 5px;
    border: solid;
    border-width: 10px;
    border-color: #999;
    
}
.code-line {
    margin: 0 0 0 0;
    display: inline-block;
    width:97%;
    background-color: transparent; 
    transition: background-color 0.1s;
}
.code-line:hover {
    cursor: pointer;
    background-color: #222;
    transition: background-color 0.1s;
}
.code-line.marked-line {
    background-color: #555;
}
#slider, #bug_slider{
    font-family: Unica One;
    font-size: 20px;
    font-weight: 600;
    color:black;
    z-index: 100;
    padding: 15px;
    box-shadow: 0 0 5px 2px #FF9933;
    border-radius: 5px;
    display: none;
}
#close-slider {
   
    top: 0%;
    right: 0%;
    margin: 0 0 0 99%;
    cursor: pointer;
    
}
#close-slider:hover {
    color: #F91313;
}
.bugnum{
    float:right;
    text-align: center;
    margin: 0 0 0 0;
    padding: 0 0 0 0;
    width: 3%;
    overflow:hidden;
    display: inline-block;
    color: red;
}
.bugnum:hover{
    cursor: pointer;
    background-color: #222;
}
#display_hint,#hover_hint{
	position:absolute;
	left:80%;
	display:none;
	margin-left:-202px;
	background-color:#fff;
	max-width:400px;
	min-width:300px;
	padding:10px 10px;
	border:1px solid rgba(0,0,0,0.1);
	top:15% ;
 }
#hover_hint{
	background-color:#ffd27f;
	color:#660000;
}
img#close {
	 position:relative;
	 right:-1%;
	 top:-8%;
	 cursor:pointer    
	  }
#option{
	/*color: #0099cc;*/
	color: #00FF00;
}
#option:hover{
	color: white;
}
#all_cont{
	position: relative;
	display: block;
}
#all_cont:after
{
	width: 100%;
	height: 480%;
	top: 0;
	content:"";
	position: absolute;
background:  url("http://itsmyfun.net/MyFiles/2014/01/A-NEW-wallpapers-HD-2013-serrcs-94.jpg") no-repeat fixed;/*rgba(255, 173, 92, 0.5);*/ /*url("http://wallpaper-download.net/wallpapers/random-wallpapers-tumblr-backgrounds-wallpaper-36963.jpg") repeat fixed;*/
z-index: -10;
opacity:1;
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
         #cont{
	  width: 75%;
	  margin: 15% 7% 7% 12%;
	  position:relative;
	  background-color: rgba(0,0,0,0.8) !important;
         color:white !important;
         border-radius: 10px !important;
         }
	 #remove{
	    font-family: Unica One;
	    border-radius: 10px;
	    background-color:rgba(220,0,0,0.8);
	    font-size:20px;
	    color:black;
	    font-weight:700;
	    border-color:rgb(220,0,0);
	    border-width: 5px;
	 }
	 #submit:hover{
	background-color: rgba(255,255,19,1) !important;
	border-color: black;
	}
	#remove:hover{
	    background-color: rgba(220,0,0,1) !important;   
	    border-color: black;
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
    <div id="all_cont">
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
        <li><a style="color:black; background-color: black; border-bottom-right-radius: 700px; border-bottom-left-radius: 700px; color:white; font-size: 20px;"><b>Welcome <?php echo $username ?></b></a></li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
	
        <li><a style="color:black;" href="#" id="option" onclick="show_instructions()"><b>Instructions</b></a></li>
	<li><a style="color:black;" href="#" onclick="get_hint_ajax()" onmouseover="hover_hint_show()" onmouseout="hover_hint_hide()" id="option"><b>Hint</b></a></li>
        
	<li><a style="color:black;" href='<?php echo base_url()."index.php/select/change_diff/$file_name" ?>' id="option"><b>Review another Code</b></a></li>
	<li><a style="color:black;" href="<?php echo base_url().'index.php/main/logout'?>" id="option"><b>Logout</b></a></li>

      </ul>
    </div>
  </div>
</nav>
</div>
<div id="wrapper">
      <div id="star" class="button dialog-open">
              <i class="icon-star"></i>
      </div>
</div>
<div class="code-container">

	<?php foreach($code_lines as $index=>$line): ?>
	
	<?php ++$index ?>
	<div id='<?php echo $index . "_bugnum" ?>' class='bugnum'>-</div><pre data-start= '<?php echo $index ?>' class="code-line line-numbers language-<?php echo $lang ?>" id="<?php echo $index ?>_line"><code><div id='<?php echo $index . "_line"?>' class="code"><?php echo $line;?></div></code></pre>
	<?php endforeach; ?>
	</div>
	
<form action="<?php echo base_url()?>index.php/ajax_sample/get_score">
    <input type="submit" value="Submit" id="submit" style="font-family: Unica One; background-color:rgba(255,255,19,0.8); font-size:20px; color:black; font-weight:700; border-color:rgb(255,255,19); border-width: 5px;">
</form>
<div id="display_hint" style="border-radius: 5px;">
	<img id="close" src="<?php echo base_url().'images/cross.png'?>" width=20px; height=20px; style="position:relative;padding: 0; top:-5px; margin:0 0 0 95%;" onclick ="remove_hint()">
	<div id="hint"></div>
</div>
<div id="hover_hint" class="alert alert-error" data-dismiss="alert">
<strong>Be careful!!!</strong> Every time you use hint, your score decreases by 2. 
</div>
</div>
</body>
<div id="popup">
</div>
<script src='<?php echo base_url()."js/bootstrap.min.js" ?>'></script>
<script src='<?php echo base_url()."js/prism.js" ?>'></script>
</html>
