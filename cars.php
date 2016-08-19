<html>
<head>
</head>
<body background = "3526033.jpg">
	<h2>Create new car</h2>
	<form action="create_car.php" method="POST" id="create_car">
		<div>
			Car name: <input type="text" name="name"/>
		</div>

		<div>
			<select name="brand">
			  <option value="Audi">Audi</option>
			  <option value="Mercedes">Mercedes</option>
			  <option value="BMW">BMW</option>
			</select>
		</div>

		<input type="submit">
	</form>

  <h2>Cars</h2>
  <form id="search" method="GET">
    Search: <input name="searchquery" type="text" size="70" maxlength="88">
    <input type="submit">

    <br><br>
    Search In:
    <select name="brand">
      <option value="Audi">Audi</option>
      <option value="Mercedes">Mercedes</option>
      <option value="BMW">BMW</option>
    </select>
  </form>

	<a href=""><button>Clear search</button></a>

  <ul id="results">
    <?php
      ini_set('display_errors', 1);
      
      $dbhost = 'localhost:3306';
      $dbuser = 'root';
      $dbpass = '123456789';

      $db = mysql_connect($dbhost,  $dbuser, $dbpass);
      $mydb = mysql_select_db("cars");
      $sql = "";

      if(isset($_GET['searchquery']) and isset($_GET['brand'])){
        $search = $_GET['searchquery'];
        $brand = $_GET['brand'];
        $sql = "SELECT id, brand, name FROM cars WHERE name LIKE '%" . $search . "%' AND brand='" . $brand  ."'";
      }
      else{
        $sql = "SELECT id, brand, name FROM cars";
      }

      $result = mysql_query($sql);

      if($result) {
        while($row = mysql_fetch_array($result)){ 
          $name = $row['name'];
          $brand = $row['brand'];
          echo "<li>" . $name . " - " . $brand . "</li>";
        }
      }
      else{
        echo 'Query failed!';
      }

      mysql_close($db);
    ?>
  </div>
</body>
</html>
