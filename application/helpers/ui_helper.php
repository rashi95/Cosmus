<?php

function navbar(){
    $base_url = base_url();
    $navbar = <<<_str
        <ul id="navbarul">
            <li class="navbarli"><a href="${base_url}index.php/main/members" class="nav">Home</a></li>
            <li class="navbarli"><a href="${base_url}index.php/main/members" class="nav">Scores</a></li>
            <li class="navbarli"><a href="" class="nav">Instructions</a></li>
	    <li class="navbarli"><a href="${base_url}index.php/main/logout" class="nav">Logout</a></li>
        </ul>
_str;
    echo $navbar;
}

function logo(){
   
    $logo = "<img src='http://localhost/cosmus/images/2.png' width=20% height=10% style='margin-left:3%; margin-top:2%;'/>";
    echo $logo;
        
}
function links(){
    $links = <<<_str
	
	<link href='http://fonts.googleapis.com/css?family=Coda:400|Unica+One' rel='stylesheet' type='text/css'>
_str;
    echo $links;
}
