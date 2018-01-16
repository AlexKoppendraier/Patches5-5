<?php

require_once("functions.php"); 

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
    <div id="logoheader"><div id="logoheaderimg"></div> <a href="index.html"><div class="logo"><img src="img/logo.png"></img></div></a>

	<div class="searchbar"><form>
                                <input class="search invis" type="text" placeholder="Waar ben je naar op zoek?" required>
                                <input class="button invis" type="button" value="Zoeken">
					<div class="button basketbar"><a href="cartsession.php">	<img style="height:45px;" src="img/cart.png"></img></a></div>			
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
        <li class="searchbarmobile"><form>
                                <input class="search" type="text" placeholder="Waar ben je naar op zoek?" required>
                                <input class="button" type="button" value="Zoeken">
</form></li>
    </ul>
      </nav>
    </header>

<div class="fullwidth">
	  		<h2 class="textbg" >Over Patchy</h2>
			<hr>
			<div class="onemid center">
			<h3>Lorem ipsum</h3>

			 dolor sit amet, consectetur adipiscing elit. Nunc tincidunt luctus enim id imperdiet. Maecenas in dolor in tortor pretium scelerisque et at felis. Duis id sem id sem bibendum ullamcorper.<img src="img/patch1.png" style="display:inline;float:left;"> Nam nec diam dignissim, vehicula purus sed, condimentum neque. Integer pellentesque aliquam vestibulum. Donec tincidunt odio eros, non sodales urna posuere sed. In quis nunc in nisi consequat egestas. Aenean tortor nulla, tincidunt in consectetur ut, consequat vel eros. Mauris volutpat odio quis imperdiet faucibus. Nulla egestas elit et pulvinar eleifend. Quisque leo augue, vestibulum eget fermentum ut, venenatis non elit. Etiam eget pretium augue, sed tempus dolor. Fusce leo enim, tristique eu nulla non, maximus tincidunt velit. Aliquam elementum mi non nunc pharetra rhoncus sed non lorem. Sed iaculis purus est, eu mattis urna imperdiet ut. Vestibulum sed rhoncus tellus.
			 <br><br>
			 <h3>Nunc fringilla</h3>
			 massa mollis facilisis tristique, sem est posuere mi, id sollicitudin libero nisl eget massa. Mauris sit amet cursus libero. Suspendisse eu odio nec est venenatis fermentum vitae vel nisl. Quisque bibendum lacus et velit interdum aliquet. In sollicitudin nisi ut lectus placerat porta. Nulla dignissim tincidunt justo ac semper. Quisque venenatis arcu enim, vel placerat diam feugiat in. Interdum et malesuada fames ac ante ipsum primis in faucibus. Donec viverra lacinia magna, sit amet posuere erat ultrices in. Donec varius elit nisl, ut sagittis est porttitor ac. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam porttitor laoreet ipsum, et egestas arcu ullamcorper pharetra. Cras fringilla, eros ut cursus egestas, sapien felis imperdiet magna, eget commodo mauris felis eget ante. Sed congue mattis justo, non rutrum sapien imperdiet sit amet.
			 <br><br>
			 <h3>Donec vitae turpis accumsan</h3>
			 porta ipsum eget, eleifend massa. Cras eget odio id velit tristique facilisis. Sed et venenatis tortor. Vivamus mattis tristique erat, quis rutrum erat viverra ut. Morbi tempus, nisl eu elementum efficitur, justo elit sollicitudin sapien, ac bibendum ante tortor vel nibh.<img src="img/patch3.png" style="display:inline;float:right;"> Curabitur sed metus eget ex dictum egestas non consequat enim. Sed laoreet tellus justo, non elementum nibh ultricies nec. Nunc efficitur quam ante, sit amet tincidunt magna ornare ut. Integer non enim mollis, pellentesque est sed, accumsan dolor. Suspendisse accumsan faucibus eros. Donec pulvinar tincidunt sem, ac tincidunt nisl tempus eu. Cras viverra metus et odio mattis, in sollicitudin ex faucibus. Nam aliquet dictum enim, id mattis massa dictum vitae. Aliquam sodales, purus vel viverra molestie, purus erat auctor arcu, vel feugiat elit elit vitae diam.
			 <br><br>
			 <h3>Mauris ac mattis orci</h3>
			 id sagittis tellus. Aliquam auctor vitae nisl sit amet ullamcorper. Nunc quis urna est. Vivamus molestie ipsum at laoreet lacinia. Phasellus ultrices elit et ipsum convallis, at laoreet nisl porta. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Praesent luctus vestibulum imperdiet. Mauris in semper nisl.
			 <br><br>
			 <h3>Duis rutrum metus eu tristique convallis</h3>
			 In hac habitasse platea dictumst. Aenean volutpat nunc ac est auctor, ut bibendum lorem auctor. Suspendisse tristique tortor venenatis ante bibendum fringilla. In vitae diam sed lacus malesuada fermentum ultricies at augue. Maecenas at est ipsum. Quisque in massa sit amet elit lacinia efficitur at vitae felis. Donec dignissim nunc vel risus blandit tristique. Donec hendrerit bibendum dapibus. Nullam sem ipsum, posuere nec lobortis sit amet, pretium eu enim. Donec lobortis tristique consequat. Aliquam lacinia accumsan felis, at blandit quam pharetra blandit. Donec placerat odio at ultrices volutpat. Quisque quis lacus justo.
			</div>

			</div>


  	</div>
    <footer>
  		<p>&copy;2014 Copyright info here...</p>
  	</footer>

  </body>
</html>