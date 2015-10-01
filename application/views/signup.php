	<!DOCTYPE html>
<html lang="en">
<head>
	 <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>COSMUS</title>
    <!-- Bootstrap -->
    <link href="/cosmus/css/bootstrap.min.css" rel="stylesheet">
    <link href="/cosmus/css/added.css" rel="stylesheet">
	<style>
		body{
	background:  url("http://itsmyfun.net/MyFiles/2014/01/A-NEW-wallpapers-HD-2013-serrcs-94.jpg") no-repeat fixed;
      }
	</style>
	<?php links() ?>
</head>
<body>
	<?php logo();
	?>
	
<div class="position">
      <div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-4 well well-sm">
            <legend> Sign up!</legend>
            <form action="http://localhost/cosmus/index.php/main/signup_validation" method="post" class="form" role="form">
          
	   <div class="row">
                <div class="col-xs-6 col-md-6">
                    <input class="form-control" name="First_Name" placeholder="First Name" value="" type="text"
                        required autofocus />
                </div>
                <div class="col-xs-6 col-md-6">
                    <input class="form-control" name="Last_Name" placeholder="Last Name"  value="" type="text"  required autofocus/>
                </div>
            </div>
	     <input class="form-control" name="Username" placeholder="Username" type="text" value=""  required autofocus/>   		
            <input class="form-control" name="Email" placeholder="Your Email" type="Email" value="" required autofocus/>
            <input class="form-control" name="Password" placeholder="Password" type="password" value="" required autofocus/>
 	    <input class="form-control" name="CPassword" placeholder="Confirm Password" type="password" value="" required autofocus/>
	    <div class="row">
	    <div class="col-xs-4 col-md-4">
                    <input class="form-control" name="age" placeholder="Age" value="" type="text"
                        required autofocus />
             </div>
          </div>			  
            <br/>																															  
            <button class="btn btn-lg btn-primary btn-block" type="submit" >
                Sign up</button><br>
            </form>
        </div>
    </div>
</div>	
</div>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/cosmus/js/bootstrap.min.js"></script>	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	

</body>
</html>




