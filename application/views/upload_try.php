<!DOCTYPE html>
<html>
   <head>
      <title>admin panel</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0" charset="UTF-8">
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/bootstrap.min.css"/>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/adminpanel.css"/>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url()?>css/instu_admin.css"/>
      <?php links(); ?>
      <script src='<?php echo base_url()."js/jquery.min.js" ?>'></script>
      <style>
         body{
         background:  url("http://itsmyfun.net/MyFiles/2014/01/A-NEW-wallpapers-HD-2013-serrcs-94.jpg") no-repeat fixed;
         }
         #option{
         color: #0099cc;
         }
         #option:hover{
         color:white;
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
      <?php 
         //echo $error."rashi";
         if(strcmp($error,"")==0)
         {
         echo '<style type="text/css">
         #test1{
         display : none;
         }
         </style>';
         }
         else
         {
         echo '<style type="text/css">
         #test1{
         display : block;
         }
         </style>';
         }
         if(strcmp($success,"")==0)
         {
         echo '<style type="text/css">
         #test2{
         display : none;
         }
         </style>';
         }
         else
         {
         echo '<style type="text/css">
         #test2{
         display : block;
         }
         </style>';
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
                     <li><a style="color:black; background-color: black; border-bottom-right-radius: 700px; border-bottom-left-radius: 700px; color:white; font-size: 20px;"><b>Welcome Admin!</b></a></li>
                  </ul>
                  <ul class="nav navbar-nav navbar-right">
                     <li><a style="color:black;" href="<?php echo base_url()."index.php/main/redirect_admin" ?>" id="option"><b>Switch to User</b></a></li>
                     <li><a href="#" style="color:black;" data-toggle="modal" data-target="#myModal" id="option"><b>Instructions</b></a></li>
                     <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                           <div class="modal-content">
                              <div class="modal-header">
                                 <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                                 </button>
                                 <h2 class="modal-title" id="myModalLabel">INSTRUCTIONS</h2>
                                 <hr>
                              </div>
                              <div class="modal-body">
                                 <ul class="list-group">
				    <li class="list-group-item">Make sure that the name of sourcefile is single word not matching with names of any other files uploaded, not even with different language or difficulty level.</li>	
                                    <li class="list-group-item">For the source file, make sure that language selected and extension of the file matches.</li>
                                    <li class="list-group-item">Make sure that there are sufficient newlines in the source file for the code to be easy to understand.</li>
                                    <li class="list-group-item">For the bugs file, make sure it has .csv estension with each line containing the line number , bug type(index), priority(Low, Medium or High) and Hint having single space between them.</li>
                                    <li class="list-group-item">Hint is basically the bug description ans is mandatory for all bugs.</li>
                                    <li class="list-group-item">Bug types and their index: 1. Indentation Error 2. Security Error 3. Logical Error 4. Conditional Error 5. Syntax Error 6. Return Value Error 7. Initialization 8. Assignment 9. Model</li>
                                    <li class="list-group-item">Remember that .csv file never gets saved!!!</li> 		
				    </ul>
                              </div>
                              <div class="modal-footer">
                                 <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                              </div>
                           </div>
                        </div>
                     </div>
                     <li style="border-bottom-right-radius: 500px; border-bottom-left-radius: 500px;"><a style="color:black; border-bottom-right-radius: 500px; border-bottom-left-radius: 500px;" href="<?php echo base_url()."index.php/upload/list_file" ?>" id="option"><b>View files' list</b></a></li>
                     <li style="border-bottom-right-radius: 500px; border-bottom-left-radius: 500px;"><a style="color:black; border-bottom-right-radius: 500px; border-bottom-left-radius: 500px;" href="<?php echo base_url()."index.php/leaderboard" ?>" id="option"><b>Leaderboard</b></a></li>
                     <li style="border-bottom-right-radius: 500px; border-bottom-left-radius: 500px;"><a style="color:black; border-bottom-right-radius: 500px; border-bottom-left-radius: 500px;" href="<?php echo base_url()."index.php/main/logout" ?>" id="option"><b>Logout</b></a></li>
                  </ul>
               </div>
            </div>
         </nav>
      </div>
      <div id="test1" class="alert alert-danger">
         <?php echo $error ?>
      </div>
      <div id="test2" class="alert alert-success">
         <?php echo $success ?>
      </div>
      <div id="cont">
         <form method="post" action="<?php echo base_url()?>index.php/upload/do_upload" enctype="multipart/form-data">
            <div class="upload_s">
               <br />
               <div class="s_lang">
                  <p>Select language.</p>
                  <select class="form-control" name="Language">
                     <option value="1">C</option>
                     <option value="2">Python</option>
                     <option value="3">Javascript</option>
                  </select>
               </div>
               <div class="s_level">
                  <p>Select level.</p>
                  <select class="form-control" name="Dif_level">
                     <option value="e">Easy</option>
                     <option value="m">Medium</option>
                     <option value="d">Difficult</option>
                  </select>
               </div>
               <div class="u_source">
                  <div class="form-group">
                     <label for="exampleInputFile">File input</label>
                     <img src="<?php echo base_url()?>images/help.png" onmouseover="div_source_show()" onmouseout="div_source_hide()">
                     <input type="file" id="exampleInputFile" name="file1" size="100">
                     <p class="help-block">Upload source code.</p>
                  </div>
               </div>
               <div class="u_bug">
                  <div class="form-group">
                     <label for="exampleInputFile">File input</label>
                     <img src="<?php echo base_url()?>images/help.png" onmouseover="div_bug_show()" onmouseout="div_bug_hide()">
                     <input type="file" id="exampleInputFile" name="file2" size="100">
                     <p>Upload .csv file</p>
                  </div>
               </div>
               <div class="my_submit">
                  <button type="submit" class="btn btn-default" id="button1" name="upload_b">Submit</button>
               </div>
            </div>
         </form>
         <form method="post" action="<?php echo base_url()?>index.php/upload/delete_file">
            <div class="u_delete">
               <div class="form-group">
                  <label for="exampleInputFile">Delete file</label><br/>
                  <input type="text" id="exampleInputFile" name="file" style="color:#000;">
                  <button type="submit" class="btn btn-default" id="button1">Delete</button>
                  <p class="help-block">Format: language/level/filename ex. c/easy/code.c</p>
               </div>
            </div>
         </form>
      </div>
      <div id="popup_source_help">
         <h4 id="heading"> Format of source code file: </h4>
         <div id="list2">
            <ol>
               <li>File extension should be .c , .js, .py depending on language selected.</li>
               <li>Make sure that after every semicolon(;),code continues in newline so that it can be understood easily.</li>
               <li>Make sure that the code compiles successfully</li>
            </ol>
         </div>
      </div>
      <div id="popup_bug_help">
         <h4 id="heading"> Format of Bug file: </h4>
         <div id="list2">
            <ol>
               <li>File extension should be .csv</li>
               <li>Every line of file will have line number, index of bug type, priority(Low, Medium,High), Hint(mandatory) separated by spaces<br/> Ex: If your code has indentation error in 5th line having low priority, line should be: <br>
                  5 1 Low Minor error
               </li>
               <li> For list of bug types with thier indices, check the help page. </li>
            </ol>
         </div>
      </div>
      <script src="http://code.jquery.com/jquery.js"></script>
      <script src='<?php echo base_url()."js/bootstrap.min.js" ?>'></script>
      <script src='<?php echo base_url()."js/instu_admin.js" ?>'></script>
   </body>
</html>
