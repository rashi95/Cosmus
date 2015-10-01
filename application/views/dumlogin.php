<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login Page</title>	
</head>
<style>
h1.login{
color:red;
}
</style>




<body>

<div id="container">
	<h1 class="login">Login</h1>
	<?php
	echo form_open('index.php/main/login_validation');
	//echo "<h1>ranjith</h1>";
	echo validation_errors();
	echo "<p>Email:";
	echo form_input("Email",$this->input->post('Email'));
	echo "</p>";
	echo "<p>Password:";
	echo form_password("Password");
	echo "</p>";
	echo "<p>";
	echo form_submit("login_submit", "Login");
	echo "</p>";
	echo form_close();


	?>
	<a href='<?php echo base_url()."index.php/main/signup" ?>'>Sign Up!</a>
</div>

</body>
</html>
