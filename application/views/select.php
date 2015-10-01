<!DOCTYPE html>
<html lang="en">
<head>
	<title>Language Preference</title>
	<?php links() ?>
</head>
<body>
	<?php logo();
	navbar();
	?>
	<div class="header">Select Your Language</div>
	<img src="/cosmus/css/image1.jpeg" width=1366px height=400px/>
	<?php $this->load->helper('form'); ?>
	
<form action="http://localhost/cosmus/index.php/select/choice_made" method="post" accept-charset="utf-8" enctype="multipart/form-data">	<div id="choice">

		You would like to review code in:<br/>
		<select name="ChoiceLang" id='choicelang'>
<option value="c" selected="selected">C</option>
<option value="py">Python</option>
<option value="js">Javascript</option>
</select>		<br /> <br />
		Choose the difficulty level of code:<br/>
		<input type="radio" name="choice_lang" value=1 /> Easy <br/>
		<input type="radio" name="choice_lang" value=2 /> Medium <br/>
		<input type="radio" name="choice_lang" value=3 /> Difficult <br/>
	</div>	
	<br /><br />
	<input type="submit" name="mysubmit" value="Start Game" class='button' />	</form>	
	</body>
</html>
