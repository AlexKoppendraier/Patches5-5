
<?php

require_once("functions.php"); 

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
               <div class="button basketbar"><a href="basket.php"	<img style="height:45px;" src="img/cart.png"></img></a></div>
        </div>

        </form>	</div>
    <nav id="nav">
        <label for="show-menu" class="show-menu">Toon Menu</label>
        <input type="checkbox" id="show-menu" role="button">
        <ul id="menu">
            <li><a href="categorieen.php">Categorieën</a></li>
						<?php
			if(isset($_SESSION['user_id'])) {  
	            echo "<li><a href='custompatch.php'>Eigen Ontwerp</a></li>";			
			}
			?>
            <li><a href="about.php">Over Ons</a></li>
            <li><a href="contact.php">Contact</a></li>
			<?php
			if(isset($_SESSION['user_id'])) {  
            echo "<li><a href='user/index.php'>Profiel</a></li>";
			}
			else{
	            echo "<li><a href='user'>Registreren / Inloggen</a></li>";			
			}
			?>
            <li class="searchbarmobile"><form action="search.php" method="GET">
                    <input class="search" name="query" type="text" placeholder="Waar ben je naar op zoek?" required>
                    <input class="button" type="submit" value="Zoeken">
                
			</form></li>
        </ul>
    </nav>
</header>

<div class="columnsContainer">
    <div class="fullwidth">
        <h2 class="textbg" >Populaire producten</h2>
        <hr>
        <div class="productview">
            <?php
            $popsql = "SELECT Product_id, product_name, prodcuct_prijs, views from product where Custom like '0' ORDER BY views DESC LIMIT 5";
            $result = $conn->query($popsql);
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



        <h2 class="textbg">Nieuwe producten</h2>
        <hr>
        <div class="productview">

            <?php
            $sql = "SELECT Product_id, product_name, prodcuct_prijs from product where Custom like '0' ORDER BY Product_id DESC LIMIT 5";
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
                echo "</table>";
            } else {
                echo "0 results";
            }

            $conn->close();
            ?>

        </div>
</div>

</div>

<footer>
    <p>&copy;2014 Copyright info here...</p>
</footer>

</body>
</html>
