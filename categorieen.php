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
			<a href="categorieen.php?filterthema=Helden">Helden</a>
			<a href="categorieen.php?filterthema=Vlaggen">Vlaggen</a>
			<a href="categorieen.php?filterthema=Leger">Leger</a>
			<a href="categorieen.php?filterthema=Autos">Autos</a>
			<a href="categorieen.php?filterthema=Steden">Steden</a>
			<a href="categorieen.php?filterthema=Dieren">Dieren</a>
			<a href="categorieen.php?filterthema=Overig">Overig</a>
	</div>
	</li>
    
	<li class="dropdown">
    <a class="dropcategory">Kleur</a>
    <div class="dropdown-content">
      <a href="categorieen.php?filterkleur=Wit">Wit</a>
      <a href="categorieen.php?filterkleur=Zwart">Zwart</a>
      <a href="categorieen.php?filterkleur=Grijs">Grijs</a>
	  <a href="categorieen.php?filterkleur=Rood">Rood</a>
	  <a href="categorieen.php?filterkleur=Blauw">Blauw</a>
	  <a href="categorieen.php?filterkleur=Groen">Groen</a>
	  <a href="categorieen.php?filterkleur=Geel">Geel</a>
	  <a href="categorieen.php?filterkleur=Oranje">Oranje</a>
	</div>
	</li>
	
	<li class="dropdown">
    <a class="dropcategory">Vorm</a>
    <div class="dropdown-content">
      <a href="categorieen.php?filtervorm=Vierkant">Vierkant</a>
      <a href="categorieen.php?filtervorm=Rond">Rond</a>
	  <a href="categorieen.php?filtervorm=Rechthoek">Rechthoek</a>
      <a href="categorieen.php?filtervorm=Schild">Schild</a>
	</div>
	</li>
	
	<li class="dropdown">
    <a class="dropcategory">Formaat</a>
    <div class="dropdown-content">
      <a href="categorieen.php?filterformaat=40x40">40x40</a>
      <a href="categorieen.php?filterformaat=40x60">40x60</a>
      <a href="categorieen.php?filterformaat=45x60">45x60</a>
	  <a href="categorieen.php?filterformaat=50x50">50x50</a>
	  <a href="categorieen.php?filterformaat=50x55">50x55</a>
	  <a href="categorieen.php?filterformaat=50x60">50x60</a>
	  <a href="categorieen.php?filterformaat=55x60">55x60</a>
	  <a href="categorieen.php?filterformaat=60x40">60x40</a>
	  <a href="categorieen.php?filterformaat=60x60">60x60</a>
	</div>
	</li>
	
	<li class="dropdown">
    <a class="dropcategory">Materiaal</a>
    <div class="dropdown-content">
      <a href="categorieen.php?filtermateriaal=Katoen">Katoen</a>
	</div>
	</li>
	
	<li class="dropdown">
    <a class="dropcategory">Prijs</a>
    <div class="dropdown-content">
      <a href="categorieen.php?minprijs=0&maxprijs=0.99">€0 - €0,99</a>
      <a href="categorieen.php?minprijs=1&maxprijs=1.99">€1 - €1,99</a>
      <a href="categorieen.php?minprijs=2&maxprijs=2.99">€2 - €2,99</a>
	  <a href="categorieen.php?minprijs=3&maxprijs=1000">>€3</a>
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
    if(isset($_GET['filterthema'])) {
		$themafilter = $_GET['filterthema'];
		//Selecteer producten
		$sql = "SELECT Product_id, product_name, prodcuct_prijs FROM product WHERE thema LIKE '%".$themafilter."%'";
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
			}
			else {
				echo "Geen resultaten";
			}
	}
	
    else if(isset($_GET['filterkleur'])) {
		$kleurfilter = $_GET['filterkleur'];
		//Selecteer producten
		$sql = "SELECT Product_id, product_name, prodcuct_prijs FROM product WHERE kleur LIKE '%".$kleurfilter."%'";
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
			}
			else {
				echo "Geen resultaten";
			}
	}
	
    else if(isset($_GET['filtervorm'])) {
		$vormfilter = $_GET['filtervorm'];
		//Selecteer producten
		$sql = "SELECT Product_id, product_name, prodcuct_prijs FROM product WHERE vorm LIKE '%".$vormfilter."%'";
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
			}
			else {
				echo "Geen resultaten";
			}
	}
	
    else if(isset($_GET['filterformaat'])) {
		$formaatfilter = $_GET['filterformaat'];
		//Selecteer producten
		$sql = "SELECT Product_id, product_name, prodcuct_prijs FROM product WHERE formaat LIKE '%".$formaatfilter."%'";
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
			}
			else {
				echo "Geen resultaten";
			}
	}
	
    else if(isset($_GET['filtermateriaal'])) {
		$materiaalfilter = $_GET['filtermateriaal'];
		//Selecteer producten
		$sql = "SELECT Product_id, product_name, prodcuct_prijs FROM product WHERE materiaal LIKE '%".$materiaalfilter."%'";
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
			}
			else {
				echo "Geen resultaten";
			}
	}
	
    else if(isset($_GET['minprijs']) && isset($_GET['maxprijs'])) {
		$minprijs = $_GET['minprijs'];
		$maxprijs = $_GET['maxprijs'];
		//Selecteer producten
		$sql = "SELECT * FROM product WHERE prodcuct_prijs between ".$minprijs." and  ".$maxprijs." ";
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
			}
			else {
				echo "Geen resultaten";
			}
	}
	
	else {
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
            } else {
                echo "Geen resultaten";
            }
	}
?>
</div>
</div>

    <footer>
  		<p>&copy;2014 Copyright info here...</p>
  	</footer>

  </body>
</html>