<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Cosmus</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/main_page.css"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <link href='http://fonts.googleapis.com/css?family=Unica+One' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/prism.css"/>
    <style>
      body{
	background:  url("http://itsmyfun.net/MyFiles/2014/01/A-NEW-wallpapers-HD-2013-serrcs-94.jpg") no-repeat fixed;
      }
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
    margin: 0 0 0 13%;
    padding: 0.5%;
    overflow: visible;
    background-color: #141414;
    width: 75%;
    border-radius: 5px;
    border: solid;
    border-width: 10px;
    border-color: #555;
    
}
.code-line {
    margin: 0 0 0 0;
    display: inline-block;
    width:100%;
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
    font-size: large;
    font-weight: 600;
    color:white;
    z-index: 100;
    background-color: #232222;
    padding: 15px;
    box-shadow: 0 0 5px 2px white;
    border-radius: 5px;
    display: none;
}
#close-slider {
    color:white;
    top: 0%;
    right: 0%;
    margin: 0 0 0 99%;
    cursor: pointer;
    color: #999;
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

.answers{
  margin: 3px 3px 3px 3px;
  
  font-size: 15px;
  font-weight: 800;
  color: black;
  font-family:Unica One;
  border-radius:18px;
  border-style: solid;
}
#correct{
  padding: 5px 5px 5px 5px;
  background:rgba(19,255,0,0.7);
  border-color:rgb(19,255,0);
}
#correct:hover{
  background:rgb(19,255,0);
  border-color:black;
  cursor: pointer;
  transition: background-color 0.1s;
}
#unanswered{
  padding: 3px 5px 3px 5px;
   background:rgba(204,255,0,0.7);
   border-color:rgb(204,255,0);
}
#unanswered:hover{
  background:rgb(204,255,0);
  border-color:black;
  cursor: pointer;
  transition: background-color 0.1s;
}
#wrong{
  padding: 5px 5px 5px 5px;
   background:rgba(220,0,0,0.7);
   border-color:rgb(220,0,0);
}
#wrong:hover{
 background:rgb(220,0,0);
 border-color:black; 
  cursor: pointer;
  transition: background-color 0.1s;
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
/*::-webkit-scrollbar {
    width: 12px;
}
 
::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3); 
    border-radius: 10px;
}
 
::-webkit-scrollbar-thumb {
    border-radius: 10px;
    -webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.5); 
}*/
</style>
  </head>
  <body>
       <div id="navigation" style="border-bottom-right-radius: 700px; border-bottom-left-radius: 700px; ">
         <nav class="navbar navbar-inverse" role="navigation" style="border-bottom-right-radius: 700px; border-bottom-left-radius: 700px; background-color: rgba(255,163,19,0.9) ; font-size:17px; font-family: Unica One; font-weight: 600;">
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
        
	
	<li><a style="color:black; font-size:19px;" href='<?php echo base_url()."index.php/select/" ?>'>Review another Code </a></li>
       
      </ul>
      <ul class="nav navbar-nav navbar-right">
      
	 <li><a style="color:black; font-size:19px;" href="<?php echo base_url()."index.php/main/members" ?>">Home </a></li>
	<li><a style="color:black; font-size:19px;">Help</a></li>
        <li><a style="color:black; font-size:19px;" href="<?php echo base_url().'index.php/leaderboard'?>">Leaderboard</a></li>
	<li><a style="color:black; font-size:19px;" href="<?php echo base_url().'index.php/main/logout'?>">Logout</a></li>		
      </ul>
    </div>
  </div>
</nav>
       </div>       
<?php
  $str = explode("_", $file_name);
  $userdb = $str[0];
  $filename = $str[1];
  /*$title = $this->session->userdata('title');
  $code_lines = $this->session->userdata('code_lines');
  $lang = $this->session->userdata('lang');
  /*
  $title, $code_lines & $lang are the same variable used in code_review.php
  view. So I think these will be enough.
  */
  $this->load->helper('file');
  
  $string=read_file($path);
  
  $string = str_replace('<', '&lt;', $string);
  $code_lines = explode("\n", $string);
  $text=explode("\n",$string);
  //Processing code lines, testing.
  for($i=0;$i<count($code_lines);++$i) {
    if ($code_lines[$i] == '')
    $code_lines[$i] = ' ';
    //echo $code_lines[$i];
  }
  $query = $this->db->get($userdb);

  foreach ($query->result() as $row)
  {
	if($row->Codes_Reviewed == $filename)
	{
		$lang = $row->Language;
		$lang = strtolower($lang);?>
		<h1 class="header" style="color: black; font-family: Unica One; background-color: rgba(255,255,255,0.9); margin: 5px 10px 30px 10px; border-radius: 4px;">&nbsp;&nbsp;&nbsp;&nbsp;Your score for <?php echo $filename.".".$lang." is ".$score; ?></h1><?php
	}
  }
  
  function render_bug($line_num,$correct, $wrong,$unanswered){
    $map_bug_type = array('1'=>'Indentation', '2'=>'Security', '3'=>'Logical', '4'=>'Conditional', '5'=>'Syntax', '6'=>'Return Value', '7'=> 'Initialization', '8'=>'Assignment', '9'=>'Model');
    for($i=0;$i<count($correct);$i++){
      if($correct[$i]['line_number']==$line_num)
        echo "<div class='answers' id='correct'>&nbsp;&nbsp;<img src='". base_url() ."images/correct.png' width=2% height=2% >&nbsp;&nbsp;&nbsp;&nbsp;Line number: ".$correct[$i]['line_number']."&nbsp;&nbsp;&nbsp;&nbsp;Bug Type: ".$map_bug_type[$correct[$i]['bug_type']]."&nbsp;&nbsp;&nbsp;&nbsp;Priority: ".$correct[$i]['priority']."</div>";
    }
    for($i=0;$i<count($unanswered);$i++){
      if($unanswered[$i]['line_number']==$line_num)
        echo "<div class='answers' id='unanswered'> &nbsp;<img src='". base_url() ."images/unanswered.png' width=3.2% height=3.2% >&nbsp;&nbsp;&nbsp;&nbsp;Line number: ".$unanswered[$i]['line_number']."&nbsp;&nbsp;&nbsp;&nbsp;Bug Type: ".$map_bug_type[$unanswered[$i]['bug_type']]."&nbsp;&nbsp;&nbsp;&nbsp;Priority: ".$unanswered[$i]['priority']."</div>";
    }
    for($i=0;$i<count($wrong);$i++){
      if($wrong[$i]['line_number']==$line_num){
        echo "<div class='answers' id='wrong'>&nbsp;&nbsp;<img src='". base_url() ."images/wrong.png' width='2%' height='2%'>&nbsp;&nbsp;&nbsp;&nbsp;Line number: ".$wrong[$i]['line_number']."&nbsp;&nbsp;&nbsp;&nbsp;Bug Type: ".$map_bug_type[$wrong[$i]['bug_type']]."&nbsp;&nbsp;&nbsp;&nbsp;Priority: ".$wrong[$i]['priority']."</div>";
      }
    }
   
  }
?>
<div class="code-container">

	<?php foreach($code_lines as $index=>$line): ?>
	
	<?php ++$index ?>
	<pre data-start= '<?php echo $index ?>' class="code-line line-numbers language-<?php echo $lang ?>" id="<?php echo $index ?>_line"><code><div id='<?php echo $index . "_line"?>' class="code"><?php echo $line;?></div></code></pre><?php render_bug($index,$correct, $wrong,$unanswered) ?>
	<?php endforeach; ?>
	</div>

<script src='<?php echo base_url()."js/prism.js" ?>'></script>

</body>
</html>
