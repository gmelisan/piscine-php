<?php
session_start();
include("show_account_info.php");
include("show_categories.php");
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
		<!-- <div class="basket"> -->
		<!--   <a href="basket.php"> -->
		<!-- 	<img class="basketimg" src="images/basket.png"> -->
		<!-- 	Корзина -->
		<!--   </a> -->
		<!-- </div> -->
		
		<form method="post" action="registration.php">
		  Логин: <input type="text" name="login" value="">
		  <br>
		  Пароль: <input type="password" name="passwd" value="">
		  <br>
		  Имя: <input type="text" name="first_name" value="">
		  <br>
		  Фамилия: <input type="text" name="second_name" value="">
		  <br>
		  Телефон: <input type="text" name="phone" value="">
		  <br>
		  <input class="button" type="submit" value="Подтвердить">
		  <br>
		</form>
	  </div>
	</div>
	<div class="footer">
	   <i> &copy; gmelisan, jdesmond 2019 </i>
	</div>
  </body>
</html>
