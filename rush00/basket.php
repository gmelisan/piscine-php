<?php

session_start();
include("show_account_info.php");
include("show_basket.php");

?>

<html>
  <head>
	<title>ft_minishop</title>
	<link rel="stylesheet" type="text/css" href="style.css">
  </head>
  <body>
	<div class="header">
	  <div class="shopname">
		<a href="index.php"> Pizza shop </a>
	  </div>
	  <div class="loginzone">
		<?php show_account_info(); ?>
	  </div>
	</div>
	<div class="center">
	  <div class="left">
	  </div>
	  <div class="content">
		<h1> Корзина </h1>
		  <?php show_basket(); ?>
		<br>
	  </div>
	</div>
	<div class="footer">
	   <i> &copy; gmelisan, jdesmond 2019 </i>
	</div>
  </body>
</html>
