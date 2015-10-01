<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>COSMUS</title>
    <link href="/cosmus/css/bootstrap.min.css" rel="stylesheet">    
    <?php links(); ?>
    <style>
	 body {
	  
	   background:  url("http://itsmyfun.net/MyFiles/2014/01/A-NEW-wallpapers-HD-2013-serrcs-94.jpg") no-repeat fixed;
           background-size: 100% 100%;		       
	 
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
    	#option{
		color: #0099cc;
	}
	#option:hover{
		color: white;
	}
	
	#welcome
        {
	    position:absolute;
	    left:2%;
	    top:10%;     
	}
	#leaderboard
{
position:absolute;
top:24%;	 
left:5%;
right:8%;     
width:70%;
height:60%;
border:1px solid rgba(255,33,33,0.1);
background: rgba(0,0,0,0.8);        
}

	thead{
		font-size: 25px;
	 }
	 tbody{
		color:#FF3300;
	 }
	td,th {
		text-align: center;
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
        <li><a style="color:black; background-color: black; border-bottom-right-radius: 700px; border-bottom-left-radius: 700px; color:white; font-size: 20px;"><b>Welcome <?php echo $username; ?></b></a></li>
      </ul>       
 	 <ul class="nav navbar-nav navbar-right">
	<li><a style="color:black;" href="<?php echo base_url()."index.php/main/redirect_leader" ?>" id="option"><b>Play Game</b></a></li>
        <li><a style="color:black;" href="<?php echo base_url()."index.php/main/members" ?>" id="option"><b>Home</b></a></li>
        <li><a style="color:black;" href="<?php echo base_url()."index.php/main/logout" ?>"id="option"><b>Logout</b></a></li> 
      </ul>
    </div>
  </div>
</nav>
</div>
  	




<h1 class="header" id="welcome" style="color:white; font-family: Unica One; font-weight: 900;">Leader Board </h1>
<div id="leaderboard" style="border: 7px solid; border-radius:10px; border-color: grey; font-family: Unica One; font-weight: 600; font-size: medium; margin-left: 10%; "  >

	<?php
	$this->load->database();
	$query = $this->db->query('SELECT Username FROM users');
	foreach ($query->result() as $row)
	{
		$user = $row->Username;
		$query2 = $this->db->get($user);
		$score = 0;
		foreach ($query2->result() as $row2)
		{
			$score = $score + $row2->Score;
			
		}
		$this->load->model('model_users');
		//$this->model_users->add_leader($user, $score);
		$flag = 0;
		$query4 = $this->db->query('SELECT * FROM leader_board');
		{
			foreach ($query4->result() as $row4)
			{
				if($row4->Username == $user)
					$flag = 1;
			}
		}
		if($flag == 0)
		{
			$data=array(
					'Username'=>$user,
					'Score'=>$score,
					);
			$did_add_leader=$this->db->insert('leader_board',$data);
		}
		elseif($flag == 1)
		{
			$data=array(
					'Score'=>$score,
					);
			$this->db->where('Username', $user);
			$this->db->update('leader_board', $data); 
		}
		//echo $data[$user];
	}
	$query = $this->db->query('SELECT * FROM leader_board ORDER BY Score DESC');
	echo "<table class='table table-striped'>";
	echo "<thead style='color:#5CD6FF;'><tr><th>Rank</th><th>Player</th><th>Score</th></tr></thead>";
	echo "<tbody>";
	$cnt = 0;
	foreach ($query->result() as $row)
	{	$cnt++;
		echo "<tr><th>".$cnt."</th><th>".$row->Username."</th><th>".$row->Score."</th></tr>";
	}
	echo "</tbody>";
	echo "</table>";

?>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 <script src="/cosmus/js/bootstrap.min.js"></script>
</body>
</html>


