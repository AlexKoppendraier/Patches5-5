<?php 
require_once("functions.php"); 

if(isset($_SESSION['user_id'])) {  
checkAdmin($_SESSION['user_id']);
if(isset($_GET['action']) && $_GET['action'] == 'logout'){
	logout();
}

if( isset($_GET['submit']) )
{ 

$product_id = $_GET['id'];
$dikte = htmlentities($_GET['dikte']);
$product_name = htmlentities($_GET['product_name']);
$prodcuct_prijs = htmlentities($_GET['prodcuct_prijs']);
$kleur = htmlentities($_GET['kleur']);
$formaat = htmlentities($_GET['formaat']);
$vorm = htmlentities($_GET['vorm']);
$thema = htmlentities($_GET['thema']);
$materiaal = htmlentities($_GET['materiaal']);
$stock = htmlentities($_GET['stock']);



$sql = "UPDATE product SET dikte='".$dikte."', product_name='".$product_name."', prodcuct_prijs='".$prodcuct_prijs."', kleur='".$kleur."', formaat='".$formaat."', vorm='".$vorm."', thema='".$thema."', materiaal='".$materiaal."', stock='".$stock."' , image='".$image."' WHERE product_id='".$product_id."'";

if (mysqli_query($db, $sql)) {
} else {
    echo "Error updating record: " . mysqli_error($db);
}
}?>
<html class=""><head>

<head>
<title> Dashboard</title>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
<link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans|PT+Sans|Roboto|Roboto+Slab|Titillium+Web" rel="stylesheet">
<style class="cp-pen-styles">* { box-sizing:border-box; }

body {
  font-family: 'PT Sans', sans-serif;
/*font-family: 'Open Sans', sans-serif;
font-family: 'Lato', sans-serif;
font-family: 'PT Sans', sans-serif;
font-family: 'Roboto Slab', serif;
font-family: 'Titillium Web', sans-serif;*/ 
  background: #ebebeb; -webkit-font-smoothing: antialiased;}

body, .wrapper {    min-height: 100vh;    margin:0;   position: relative;}
.wrapper {    position: relative;    top: 0;    height: 100vh;}
.sidebar, .main-panel {    overflow: auto;    max-height: 100%;    height: 100%;    -webkit-transition-property: top,bottom;    transition-property: top,bottom;    -webkit-transition-duration: .2s,.2s;    transition-duration: .2s,.2s;    -webkit-transition-timing-function: linear,linear;    transition-timing-function: linear,linear;    -webkit-overflow-scrolling: touch;}
.sidebar { overflow:hidden;   position: absolute;    top: 0;    bottom: 0;    left: 0;    width: 260px;    display: block;    z-index: 1;    color: #fff;    font-weight: 200;    background-size: 100px; background-position: center center; background:url("images/bg2.png"); border:2px solid sandybrown;    background-color: #ffd34e;    box-shadow: 0px 0px 10px #89898a;}
.sidebar .sidebar-wrapper {    position: relative;    max-height: none;    min-height: 100%;    overflow: hidden;    width: 260px;    z-index: 4;}
.sidebar .logo, body > .navbar-collapse .logo {    padding: 10px 15px;   border-bottom: 1px solid rgba(255, 255, 255, 0.2);    text-align: center;    padding-top: 22%;    box-shadow: 0px 0px 20px #333;}
.sidebar .logo img {	width: 150px;    border-radius: 50%;    border: 10px solid #eacc71;}
.sidebar .logo img:hover{	border-color: #eacc71;	opacity: 0.8;}
.sidebar .logo .simple-text, body > .navbar-collapse .logo .simple-text {
    text-transform: uppercase;    padding: 25px 0px;    display: block;    font-size: 18px;    color: #FFFFFF;    text-align: center;    font-weight: 400;    line-height: 30px;}
.main-panel {
    background: rgba(203, 203, 210, 0.15);    position: relative;    z-index: 2;    float: right;    width: calc(100% - 260px);    min-height: 100%;}
a, a:hover{ text-decoration: none; cursor: pointer;}
.main-panel .navbar {    margin-bottom: 0;    background-color: rgba(255, 255, 255, 0.96);    border-bottom: 1px solid rgba(0, 0, 0, 0.1);    border: 0;    font-size: 16px;    border-radius: 0;    padding: 10px 10px;    box-shadow: 0px 0px 5px #89898a;}
.container-fluid {    padding:5px 15px;    margin-right: auto;    margin-left: auto;    line-height: 30px;    font-size: 20px;      display: list-item;}
.container-fluid a{ color:#2196F3; }
.container-fluid a:hover{ color:#9C27B0; }
.container-fluid .right{ float:right; width:50%; margin:0; text-align: right;}
.container-fluid .left{ float:left; width:50%; margin:0;}
.sidebar .nav {    margin-top: 20px;    padding-left: 0;    margin-bottom: 0;    list-style: none;}
.nav>li {    position: relative;    display: block;}
.sidebar .nav li.active > a{    color: #FFFFFF;    opacity: 1;    background: rgba(255, 255, 255, 0.23);}
.sidebar .nav li:hover > a {	background: rgba(255, 255, 255, 0.15);}
.sidebar .nav li > a {  color: #FFFFFF;   margin: 5px 15px;   opacity: .86;   border-radius: 4px;}
.nav>li>a { position: relative;    display: block;    padding: 10px 15px;}
.main-panel > .content {    padding: 30px 15px;    min-height: calc(100% - 103px);}
.main-panel > .footer {    border-top: 1px solid #e8e8e8; /*background: #fff;*/}
.footer nav > ul {    list-style: none;    margin: 0;    padding: 0;    font-weight: normal;}
.footer nav > ul li {	float: left;}
.footer:not(.footer-big) nav > ul a {    padding: 10px 0px;    margin: 10px 10px 10px 0px;    font-size: 14px;}
.footer:not(.footer-big) nav > ul li {    margin-left: 0px;    float: left;}
.footer .copyright { color: #777777;  padding: 5px 15px;   margin: 0;    line-height: 20px;    font-size: 14px;}
.pull-left {    float: left!important;}
.pull-right {    float: right!important;}
.CenterForm {background-color:#fff; width: 420px;    margin: 0 auto;    z-index: 99;    display: block;    margin-top: 5%;    background: transparent;    border-radius: .25em .25em .4em .4em;    text-align: center;    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);    color: #fff;}
hgroup {    text-align: center;    margin-top: 3em;    opacity: 0.7;    padding: 30px; border:2px solid sandybrown;  background:url("images/bg2.png");  background-color: #ffd34e;}
.toggle {   display: none;}
@media (max-width: 991px){
	.sidebar{ left: -260px; -webkit-transition: left 0.3s;
    -moz-transition: left 0.3s;
    -ms-transition: left 0.3s;
    -o-transition: left 0.3s;
    transition: left 0.3s;}
	.main-panel { width: 100%; }
	.sidebar.active{ left: 0; }
	.main-panel.active { width: calc(100% - 260px); }
	.container-fluid, .navbar {      width: 100vw ; padding-left: 0px; padding-right:30px; }
	.container-fluid .right, .container-fluid .left { width: 40%; }
	.toggle { display: block; float:  left;  padding-top:8px;     width: 10%;}
	.toggle .icon-bar+.icon-bar{ margin-top: 4px; }
	.toggle .icon-bar {  display: block;    position: relative; background: #F44336;   width: 24px;    height: 2px;    border-radius: 1px;    margin: 0 auto;}
}
	.error, .success {

	    margin:20px auto;
	    padding:0 10px;
		border-radius:5px;
	    color: #dd2200;
	    text-align:justify;

		/*-webkit-box-shadow: 0px 0px 15px 2px rgba(0,0,0,0.75);
		-moz-box-shadow: 0px 0px 15px 2px rgba(0,0,0,0.75);
		box-shadow: 0px 0px 15px 2px rgba(0,0,0,0.75);*/
	}

	.error {
			background-color: #FAFFBD;
			border: 1px solid #DAAAAA;
			color: #D8000C;
			
		}

	.success { 		
			background-color: #BBF6E2;
			border: 1px solid #6ADE95;
		}
		table { 
  color: #333;
  font-family: Helvetica, Arial, sans-serif;
  width: 640px;
  /* Table reset stuff */
  border-collapse: collapse; border-spacing: 0; 
}
td{
	float:left;
	width:200px;
}

::-webkit-input-placeholder { /* WebKit, Blink, Edge */
   color:    #000;
}
:-moz-placeholder { /* Mozilla Firefox 4 to 18 */
   color:    #000;
   opacity:  1;
}
::-moz-placeholder { /* Mozilla Firefox 19+ */
   color:    #000;
   opacity:  1;
}
:-ms-input-placeholder { /* Internet Explorer 10-11 */
   color:    #000;
}
::-ms-input-placeholder { /* Microsoft Edge */
   color:    #000;
}

::placeholder { /* Most modern browsers support this now. */
   color:    #000;
}
</style></head>
<body>
<div class="wrapper">
	<div class="sidebar" id="sidebar">
		<div class="sidebar-wrapper">
			<div class="logo">
				<img src="images/logo.png" > 
				<a href="#" class="simple-text"> Shop </a>
			</div>
			<ul class="nav"> 
			<li class="active"><a href="products.php"> Producten </a></li>
			<li> <a href="#"> Orders </a></li>	
			<li> <a href="users.php"> Klanten </a></li>				
			<!--<li> <a href="#"> Profile </a></li> -->
			<li> <a href="index.php?action=logout"> Log out </a></li>
			</ul>
		</div>
	</div>
	<div class="main-panel" id="main-panel">
		<div class="navbar">
			<div class="container-fluid">
			<a href="#header" onclick="toggleMenu();" class="toggle">
				<span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></a> 
			<a class="left" > Dashboard</a>
			<a class="right" href="index.php?action=logout" > Logout</a>
			</div>
		</div>
		<div class="content"> 
			<div class="CenterForm">
				<hgroup>
			      <h1>Producten</h1>
			    </hgroup>
			</div>
			<div style="background:white; width: 140-px;    margin: 0 auto;    z-index: 99;    display: block;  ">
				<?php 
				$id = $_GET["id"];
				$sql = "SELECT * FROM product WHERE Product_id = '".$id."'";	
				$result = mysqli_query($db, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_assoc($result)) {
        echo "<form action='' method='get' enctype='multipart/form-data' style='width:600px;margin:0 auto;'>";
		echo "<table><tr><td>";
		echo "Product Naam : <input type='text' name='product_name' value=".$row["product_name"].">";
		echo "</td><td>";
		echo "Product Prijs : <input type='text' name='prodcuct_prijs' value=".$row["prodcuct_prijs"].">";
		echo "</td><td>";
		echo "Formaat : <input type='text' name='formaat' value=".$row["formaat"].">";
		echo "</td><td>";
		echo "Dikte : <input type='text' name='dikte' value=".$row["dikte"].">";
		echo "</td><td>";
		echo "Korm : <input type='text' name='vorm' value=".$row["vorm"].">";
		echo "</td></tr><tr><td>";
		echo "Kleur : <input type='text' name='kleur' value=".$row["kleur"].">";
		echo "</td><td>";
		echo "Thema : <input type='text' name='thema' value=".$row["thema"].">";
		echo "</td><td>";
		echo "Materiaal : <input type='text' name='materiaal' value=".$row["materiaal"].">";
		echo "</td><td>";
		echo "Voorraad : <input type='text' name='stock' value=".$row["stock"].">";
		echo "</td><td>";
		echo "Foto : <input type='file' name='image' id='image'>";
		echo "<img src=\"getproduct.php?Product_id=$row[Product_id]\",, height=\"150\"></img>";
		echo "</td><td>";
		echo "<input type='submit' name='submit' ></input>";
		echo "<input type='hidden' name='id' value='".$id."'>";
		echo "</td></tr></table>";
}
}

?>
				</div>
		</div>
		<footer class="footer">
            <div class="container-fluid">
                <p class="copyright pull-right">
                    &copy; 2017 Patchy
                </p>
            </div>
        </footer>
	</div>
</div>
<script type="text/javascript">
var toggleMenu = function(){
    var m = document.getElementById('sidebar'),
        c = m.className;
	    m.className = c.match( ' active' ) ? c.replace( ' active', '' ) : c + ' active';

	    var m = document.getElementById('main-panel'),
        c = m.className;
	    m.className = c.match( ' active' ) ? c.replace( ' active', '' ) : c + ' active';
}
</script>
</body></html>
<?php } else { 
		header('Location: login.php');
	exit();
} ?>