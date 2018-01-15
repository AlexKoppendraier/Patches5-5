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

//Check URL variabele
if(isset($_GET['Product_id'])) {
	$Product_id = $_GET['Product_id'];
	//Selecteer product
	$sql = "SELECT * FROM product WHERE Product_id = '$Product_id' LIMIT 1";
    $result = $conn->query($sql);       
	if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
	//Laad alle productdata
		$Product_id = $row['Product_id'];
		$product_name = $row['product_name'];
		$product_prijs = $row['prodcuct_prijs'];
		$dikte = $row['dikte'];
		$kleur = $row['kleur'];
		$formaat = $row['formaat'];
		$vorm = $row['vorm'];
		$materiaal = $row['materiaal'];
		$thema = $row['thema'];
		$views = $row['views'];
		$image = $row['image'];
		$voorraad = $row['stock'];
		$custom = $row['custom_patch'];
		}
		$newviews = $views + 1;
		$conn->query("UPDATE product SET views=$newviews WHERE Product_id=$Product_id");
		
	}
	else{ 
	echo "This item does not exist";
	exit();
	}
}
else {
	echo "This page does not exist.";
	exit();
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
        <li><a href="custompatch.php">Eigen Ontwerp</a></li>
        <li><a href="#">Over Ons</a></li>
        <li><a href="#">Contact</a></li>
		<li><a href="/user">Inloggen</a></li>
        <li class="searchbarmobile"><form action="search.php" method="GET">
                    <input class="search" name="query" type="text" placeholder="Waar ben je naar op zoek?" required>
                    <input class="button" type="submit" value="Zoeken">
                
		</form></li>
    </ul>
      </nav>
    </header>
<div class="columnsContainer">
	<div class="fullwidth">	
	<?php

	echo "<h2 class=\"textbg\" > $product_name </h2>
	</div>	
		<div class=\"itemview\">
		<img src=\"GetProductImage.php?Product_id=$Product_id\", widht=\"150\", height=\"150\"></img>
		</div>
		<div class=\"iteminfo\">
		- Naam: $product_name <br><br>
		- Formaat in mm: $formaat <br><br>
		- Dikte in mm: $dikte <br><br>
		- Materiaal: $materiaal <br><br>";
		
		if($voorraad > 0) {
			echo "<div class=\"in-stock\">$voorraad op voorraad</div>";
		}
		else {
			echo "<div class=\"not-in-stock\">Niet op voorraad</div>";
		}
		
		echo"
		<div class=\"price\">&euro; $product_prijs</div>
		<input class=\"button addtocart\" type=\"submit\" value=\"In winkelwagen\">
		<input class=\"button addtofavorites\" type=\"submit\" value=\"Toevoegen aan Favorieten\">
		</div>
	</div>";
	?>
	
	<div class="fullwidth">
	<h2 class="textbg">Gerelateerde producten</h2>
	</div>	
        <div class="productview">

            <?php
            $sql = "SELECT Product_id, product_name, prodcuct_prijs FROM product WHERE thema LIKE '$thema' AND custom_patch LIKE '0' AND NOT Product_id = '$Product_id' LIMIT 5";
            $result = $conn->query($sql);
            
			if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    $Product_id = $row['Product_id'];
					echo "<div class=\"product\">
					<a href=product.php?Product_id=$Product_id>
                    <img src=\"GetProductImage.php?Product_id=$Product_id\", widht=\"150\", height=\"150\"></img>
                    <div class=\"title\">" . $row["product_name"]. "</div>
                </a>
                <div class=\"price\">&euro;" . $row["prodcuct_prijs"]. "</div>
            </div>";
                }
            } else {
                echo "0 results";
            }

            $conn->close();
            ?>
	</div>
	
    <footer>
  		<p>&copy;2014 Copyright info here...</p>
  	</footer>

  </body>
</html>