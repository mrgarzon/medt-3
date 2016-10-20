<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Test</title>
</head>

<body>
	<h1>Einfache Textausgabe mit echo! </h1>
	<?php echo "<h1>Hello World1!</h1>";?>
	<h2>
	<?php echo "Hello World2!";?>
	</h2>
	<h2>
	<?php echo "Hello";?>
	<?php echo " world</h2>";?>
	
	<h2>
	<?php echo 'Hello, "world" 3!'; //As it is?>
	</h2>

	<h1>Textausgabe mit echo und Variablen</h1>
	
	<?php
	$myString1="Hello,";
	$myString2="world!";
	$myInt=12;
	?>
</body>
</html>