<?php

session_start();
include("show_account_info.php");
include("show_categories.php");
include("print_error.php");
include("show_items.php");
include("basket_total_price.php");

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
		Категории:
		<br>
		<hr>
		<a href="index.php"> Все </a>
		<br>
		<?php show_categories(); ?>
	  </div>
	  <div class="content">
		<div class="basket">
		  <a href="basket.php">
			<img class="basketimg" src="images/basket.png">
			Корзина <?php basket_total_price();?>
		  </a>
		</div>
		<?php print_error();?>
		<?php show_items(); ?>
	  </div>
	</div>
	<div class="footer">
	   <i> &copy; gmelisan, jdesmond 2019 </i>
	</div>
  </body>
</html>
