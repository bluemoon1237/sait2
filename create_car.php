<?php
      ini_set('display_errors', 1);
      
      $dbhost = 'localhost:3306';
      $dbuser = 'root';
      $dbpass = '123456789';

      $db = mysql_connect($dbhost,  $dbuser, $dbpass);
      $mydb = mysql_select_db("cars");

      if(isset($_POST['name']) and isset($_POST['brand'])){
	      mysql_query("INSERT INTO cars (name, brand) VALUES ('" . $_POST['name'] . "', '" . $_POST['brand'] . "');");
      }

      mysql_close($db);
      header("Location: cars.php");
    ?>
