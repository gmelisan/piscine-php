<?php

session_start();
include("show_account_info.php");
include("show_orders.php");
include("all_orders_link.php");
include("edit_categories_link.php");
include("edit_articles_link.php");

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
		<a href="account.php"> Мои заказы </a> <br>
		<a href="edit_account.php"> Редактировать информацию</a> <br>
		<?php all_orders_link(); ?> <br>
          <?php edit_articles_link(); ?> <br>
          <?php edit_categories_link(); ?> <br>
	  </div>
	  <div class="content">
		<h1>Мои заказы</h1>
		<?php show_orders(); ?>
	  </div>
	</div>
	<div class="footer">
	   <i> &copy; gmelisan, jdesmond 2019 </i>
	</div>
  </body>
</html>
