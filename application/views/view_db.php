<!DOCTYPE html>
<html lang="en">
<head>
	<title><?php echo $title; ?></title>

	
</head>
<body>

<div id="container">
	<h1>Welcome to CodeIgniter!</h1>
	<?php 
	foreach ($results as $row ) {
		echo $row->ID;
		echo $row->Name. '<br />';

	}
	?>
</div>

</body>
</html>