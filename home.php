<!DOCTYPE html>
<html>
<head>
<title>Brent</title>
<meta charset="UTF-8">
<meta name="description" content="URL Shortener">
<meta name="keywords" content="HTML,CSS,PHP,codeigniter">
<meta name="author" content="Brent Gammon">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
<style>
*{
font-family:Calisto MT,Georgia, serif;
}

body,.jumbotron,.container{
background-color:#DDDDDD;
}

.pad{
padding-top:20%;		
}
</style>
</head>



<body >
	<div class="jumbotron">
		<h1 class="text-center">Brent's URL Shortener</h1>
	</div>
	
	<div class="container-fluid text-center">

		<form class="form-inline form text-center" action="http://url.brentgammon.co.uk/URL/add" method="post">
			<div class="form-group">
			<label for="input">URL:</label>
			<input type="url" name="site" value="http://" size="40" class="input form-control">
			<input type="submit" value="Submit" class="btn btn-default">
			</div>
		</form>
<br>

<?php
if(isset($code))
{
echo "<p class='text-center'>"."http://url.brentgammon.co.uk/URL/get/".$code->code."</p>";		
}
if(isset($mess))
{
echo "<p class='text-center'>".$mess."</p>";	
}
?> 
		<div class="text-center pad">
		<p>Made by <a href="http://www.brentgammon.co.uk/">Brent Gammon</a></p>
		<p> <a href="https://twitter.com/brent_gammon"><i class="fa fa-twitter fa-2x "></i></a></p>
		</div>
	</div>
</body>
</html>