<?php
$servername = "localhost";
$username = "root";
$password = "";
$mysql_name = 'webshop';


// creërt de connectie
$conn = new mysqli($servername, $username, $password, $mysql_name);

// Checkt connectie
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>

<html>
	<head>
		<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <title>Store</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/css.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

  </head>
  
  <body>
    
    <header>
    <div id="logoheader"><div id="logoheaderimg"></div> <a href="fetch.php"><div class="logo"><img src="img/logo.png"></img></div></a>

        <div class="searchbar"><form action="search.php" method="GET">
                <input class="search invis" name="query" type="text" placeholder="Waar ben je naar op zoek?" required>
                <input class="button invis" type="submit" value="Zoeken">
                <div class="button basketbar"><a href="#"><img style="height:45px;" src="img/cart.png"></img></a></div>
        </div>								
								
</form>	</div>
	<nav id="nav">
    <label for="show-menu" class="show-menu">Toon Menu</label>
    <input type="checkbox" id="show-menu" role="button">
        <ul id="menu">
        <li><a href="categorieen.php">Categorieën</a></li>
        <li><a href="http://test.com">Eigen Ontwerp</a></li>
        <li><a href="#">Over Ons</a></li>
        <li><a href="#">Contact</a></li>
		<li><a href="login.html">Inloggen</a></li>
        <li class="searchbarmobile"><form action="search.php" method="GET">
                    <input class="search" name="query" type="text" placeholder="Waar ben je naar op zoek?" required>
                    <input class="button" type="submit" value="Zoeken">
                
		</form></li>
    </ul>
      </nav>
    </header>
		<nav id="nav">
	  	<div class="fullwidth">
	  		<h2 class="textbg" >Categorieën</h2>
			<hr>
			
	<label for="show-menu" class="show-menu">Toon categorieën</label>
	<input type="checkbox" id="show-menu" role="button">
	<ul id="menu">
	<li class="dropdown">
		<a class="dropcategory">Thema</a>
		<div class="dropdown-content">
			<a href="#">Helden</a>
			<a href="#">Overig</a>
			<a href="#">Vlaggen</a>
			<a href="#">Leger</a>
			<a href="#">Autos</a>
			<a href="#">Steden</a>
			<a href="#">Dieren</a>
			<a href="#">Overig</a>
	</div>
	</li>
    
	<li class="dropdown">
    <a class="dropcategory">Kleur</a>
    <div class="dropdown-content">
      <a href="#">Wit</a>
      <a href="#">Zwart</a>
      <a href="#">Grijs</a>
	  <a href="#">Rood</a>
	  <a href="#">Blauw</a>
	  <a href="#">Groen</a>
	  <a href="#">Geel</a>
	  <a href="#">Oranje</a>
	</div>
	</li>
	
	<li class="dropdown">
    <a class="dropcategory">Vorm</a>
    <div class="dropdown-content">
      <a href="#">Vierkant</a>
      <a href="#">Rond</a>
	  <a href="#">Rechthoek</a>
      <a href="#">Schild</a>
	</div>
	</li>
	
	<li class="dropdown">
    <a class="dropcategory">Formaat</a>
    <div class="dropdown-content">
      <a href="#">40x40</a>
      <a href="#">40x60</a>
      <a href="#">45x60</a>
	  <a href="#">50x50</a>
	  <a href="#">50x55</a>
	  <a href="#">50x60</a>
	  <a href="#">55x60</a>
	  <a href="#">60x40</a>
	  <a href="#">60x60</a>
	</div>
	</li>
	
	<li class="dropdown">
    <a class="dropcategory">Materiaal</a>
    <div class="dropdown-content">
      <a href="#">Katoen</a>
	</div>
	</li>
	
	<li class="dropdown">
    <a class="dropcategory">Prijs</a>
    <div class="dropdown-content">
      <a href="#">€0 - €0,99</a>
      <a href="#">€1 - €1,99</a>
      <a href="#">€2 - €2,99</a>
	</div>
	</li>
	
    </ul>
      </nav>
			</div>
			</div>
			
	<div class="fullwidth">
	
	  		<h2 class="textbg">Producten</h2>
			<hr>
			<div class="productview">
			
<?php
            $sql = "SELECT Product_id, product_name, prodcuct_prijs FROM product";
            $result = $conn->query($sql);
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $Product_id = $row['Product_id'];
					echo "<div class=\"product\"><a href=product.php?Product_id=$Product_id>
                    <img src=\"GetProductImage.php?Product_id=$Product_id\", widht=\"150\", height=\"150\"></img>
                    <div class=\"title\">" . $row["product_name"]. "</div>
                </a>
                <div class=\"price\">&euro;" . $row["prodcuct_prijs"]. "</div>
            </div>";
                }
                echo "</table>";
            } else {
                echo "0 results";
            }

            ?>


            </div>
			</div>

    <footer>
  		<p>&copy;2014 Copyright info here...</p>
  	</footer>

  </body>
</html>