<?php
 require_once("functions.php");
 	global $db; 
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

<div class="patchupload" >
<?php
$sql = "SELECT * FROM product ORDER BY Product_id DESC LIMIT 1";
$result = mysqli_query($db, $sql);
    while($row = mysqli_fetch_assoc($result)) {
		echo "".$row["Product_id"]."";
				echo "<div><img src=\"GetProductImage.php?Product_id=$row[Product_id]\",, height=\"150\"></img></div>";
}
?>	
<div class="form-container" style="width:500px;margin:0 auto;">
	<form action="patchimgupload.php" method="post" enctype="multipart/form-data">
	<div class="form-title" style="float: left;margin-right: 15px;margin-top:7px;">Patch Naam : </div><input class="form-field" type="text" name="product_name">
	<div class="form-title" style="float: left;margin-right: 35px;margin-top:7px;">Materiaal : </div><select class="form-field" type="text" name="materiaal"><option value='wol'>Wol</option><option value='metaal'>Metaal</option><option value='katoen'>Katoen</option></select>
	<div class="form-title" style="float: left;margin-right: 40px;margin-top:7px;">Formaat : </div><input style="width:130px;"  class="form-field" type="text" name="breedte" placeholder="breedte (mm)" > x <input style="width:130px;"  class="form-field" type="text" name="hoogte" placeholder="hoogte (mm)" >
	<div class="form-title" style="float: left;margin-right: 65px;margin-top:7px;">Dikte : </div><input  class="form-field" type="text" name="dikte" placeholder="dikte (mm)" >
	<input type="submit"  class="submit-button" name="submitpart2"		value="Doorgaan"/>

	</form>
	</div>
</div>
	<footer>
  		<p>&copy;2014 Copyright info here...</p>
  	</footer>

  </body>
</html>