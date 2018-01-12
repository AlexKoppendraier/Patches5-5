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
	Select patch image to upload:
	<form action="patchupload.php" method="post" enctype="multipart/form-data">
    <input type="file" name="CustomPatch" id="CustomPatch">
    <input type="submit" value="Upload Patch" name="submit">
	</form>
	</div>
	
	<footer>
  		<p>&copy;2014 Copyright info here...</p>
  	</footer>

  </body>
</html>