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

<div class="patchupload">
<?php
$target_dir = "patchcustom/";
$target_file = $target_dir . basename($_FILES["CustomPatch"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check of er al een bestand bestaat met dezelfde naam
if (file_exists($target_file)) {
    echo "Er is al een bestand geupload met dezelfde naam. Geef het bestand een andere naam en probeer het opnieuw.";
    $uploadOk = 0;
}
// Check of de foto wel een foto is
if ($uploadOk != 0) {
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["CustomPatch"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "Het verzonden bestand is geen foto, probeer opnieuw.";
        $uploadOk = 0;
    }
}
}
// Sta alleen jpeg en png toe
if ($uploadOk != 0) {
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
    echo "Sorry, alleen bestanden van JPG, JPEG & PNG formaat zijn toegestaan.";
    $uploadOk = 0;
}
}
// Check of de foto geupload kan worden
if ($uploadOk != 0) {
if (move_uploaded_file($_FILES["CustomPatch"]["tmp_name"], $target_file)) {
    echo "Het bestand ". basename( $_FILES["CustomPatch"]["name"]). " is geupload.";
}
else {
	echo "Sorry, er is iets misgegaan tijdens het uploaden van het bestand.";
}
}
?>	
</div>
	<footer>
  		<p>&copy;2014 Copyright info here...</p>
  	</footer>

  </body>
</html>