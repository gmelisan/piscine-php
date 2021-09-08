<?php

session_start();
include("show_account_info.php");
include("show_orders.php");
include("all_orders_link.php");
include("edit_categories_link.php");
include ("edit_articles_link.php");

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
		<h1>Редактировать информацию</h1>

		<!-- form -->
          <form method="post" action="edit.php">
              Новый пароль: <input type="password" name="new_passwd" value="">
              <br>
              Имя: <input type="text" name="first_name" value="">
              <br>
              Фамилия: <input type="text" name="second_name" value="">
              <br>
              Телефон: <input type="text" name="phone" value="">
              <br>
              Старый пароль: <input type="password" name="old_passwd" value="">
              <br>
              <input class="button" type="submit" value="Подтвердить">
              <br>
          </form>
      <?php
        if($_GET["edit"] === "ok")
          echo "Успешно";
        if($_GET["edit"] === "error")
            echo "Ошибка";
          ?>
	  </div>
	</div>
	<div class="footer">
	   <i> &copy; gmelisan, jdesmond 2019 </i>
	</div>
  </body>
</html>
