<?php

session_start();
include("show_account_info.php");
include("show_orders.php");
include("all_orders_link.php");
include("all_orders.php");
include("order_details.php");

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
		<?php all_orders_link(); ?>
	  </div>
	  <div class="content">
        <h1>Детали заказа <?php echo $_GET["id"];?></h1>
		<?php order_details($_GET["id"]); ?>
	  </div>
	</div>
	<div class="footer">
	   <i> &copy; gmelisan, jdesmond 2019 </i>
	</div>
  </body>
</html>
