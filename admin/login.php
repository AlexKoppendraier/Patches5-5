<html class=""><head>
<?php  

require_once("functions.php");
if(isset($_SESSION['user_id'])) {
	header('Location: index.php');
	exit();
}else {
$register_errors= $login_error = array();
if('POST' == $_SERVER['REQUEST_METHOD'] && isset($_POST['register'])) {
	$fields = array(
				'voornaam',
				'tussenvoegsel',
				'achternaam',
				'adres',
				'huisnummer',
				'postcode',
				'geboortedatum',
				'telefoonnummer',
				'email',
				'password'
	);
	foreach ($fields as $field) {
		if (isset($_POST[$field])) $posted[$field] = stripslashes(trim($_POST[$field])); else $posted[$field] = '';
	}
	if ($posted['voornaam'] == null)
		array_push($register_errors,  sprintf('<strong>Notice</strong>: Vul een voornaam in.', 'neem'));
	if ($posted['achternaam'] == null)
		array_push($register_errors,  sprintf('<strong>Notice</strong>: Vul een achternaam in.', 'neem'));
	if ($posted['adres'] == null)
		array_push($register_errors,  sprintf('<strong>Notice</strong>: Vul een adres in.', 'neem'));
	if ($posted['huisnummer'] == null)
		array_push($register_errors,  sprintf('<strong>Notice</strong>: Vul een huisnummer in.', 'neem'));
	if ($posted['postcode'] == null)
		array_push($register_errors,  sprintf('<strong>Notice</strong>: Vul een postcode in.', 'neem'));
	if ($posted['geboortedatum'] == null)
		array_push($register_errors,  sprintf('<strong>Notice</strong>: Vul een geboortedatum in.', 'neem'));
	if ($posted['telefoonnummer'] == null)
		array_push($register_errors,  sprintf('<strong>Notice</strong>: Vul een telefoonnummer.', 'neem'));
	if ($posted['email'] == null)
		array_push($register_errors,  sprintf('<strong>Notice</strong>: Vul een email in.', 'neem'));
	if(emailExist($posted['email'])){
		array_push($register_errors, sprintf('<strong>Notice</strong>: De email bestaat al.', 'neem'));
	}
	$reg_errors = array_filter($register_errors);
	if (empty($reg_errors)) {   //Check whether everything entered to create new user.
		register($posted['voornaam'], $posted['tussenvoegsel'],  $posted['achternaam'], $posted['adres'], $posted['huisnummer'], $posted['postcode'], $posted['geboortedatum'], $posted['telefoonnummer'], $posted['password'], $posted['email']); 
	}	
}
if('POST' == $_SERVER['REQUEST_METHOD'] && isset($_POST['login'])) {	
	$username = stripslashes(trim($_POST['username']));
	$password = stripslashes(trim($_POST['password']));
	$mismatchErr = '';
	if ($password == null )
		array_push($login_error, sprintf('<strong>Notice</strong>: Vul een wachtwoord in.', 'neem'));
	if ($username == null )
		array_push($login_error, sprintf('<strong>Notice</strong>: Vul een email in.', 'neem'));
	$log_error = array_filter($login_error);
	if (empty($log_error)) {   //Check whether everything entered to create new user.
		$loginn = login($username, $password);
		if($loginn){
			$_SESSION['user_id'] = $loginn;
			header('Location: index.php');
			exit();
		}else {
			$mismatchErr .=  sprintf('<p> <strong>Notice</strong>: Please enter Valid Credentials. </p>', 'neem');			
		}
	}
}

?>
<head>
<title> Login - Patchy</title>
<link href="https://fonts.googleapis.com/css?family=Lato|Open+Sans|PT+Sans|Roboto|Roboto+Slab|Titillium+Web" rel="stylesheet">
<style class="cp-pen-styles">* { box-sizing:border-box; }

body {
  font-family: 'PT Sans', sans-serif;
/*font-family: 'Open Sans', sans-serif;
font-family: 'Lato', sans-serif;
font-family: 'PT Sans', sans-serif;
font-family: 'Roboto Slab', serif;
font-family: 'Titillium Web', sans-serif;*/ 
  background: #ebebeb;
  -webkit-font-smoothing: antialiased;
}

hgroup {   text-align:center;  margin-top: 3em;  opacity: 0.7;  padding: 30px;  background-color: #ffd34e;}
h1, h3 { font-weight: 300; }
h1 { color: #fff; }
form {      padding: 30px;    padding-top: 60px;    background: #fff;}
.powered{    padding: 10px;    margin-top: -16px;    line-height: 25px;    background: #03a9f4;}
.powered a {    color: #ddd;    text-decoration: none;}
.powered a:hover {  font-style:italic;}
.group {   position: relative;  margin-bottom: 45px; }

input {  font-size: 18px;  padding: 10px 10px 10px 5px;  -webkit-appearance: none;  display: block;  background: transparent;  color: #f4a103;  width: 100%;  border: none;  border-radius: 0;  border-bottom: 1px solid #ddd;}

input:focus { outline: none; }

/* Label */
label {  color: #999;   font-size: 18px;  font-weight: normal;  position: absolute;  pointer-events: none;  left: 5px;  top: 10px;  -webkit-transition:all 0.2s ease;  transition: all 0.2s ease;}

/* active */

input:focus ~ label, input.used ~ label {  top: -20px;  -webkit-transform: scale(.75);          transform: scale(.75); left: -2px;  color: #f4a103;}

/* Underline */
.bar {  position: relative;  display: block;  width: 100%;}
.bar:before, .bar:after {  content: '';  height: 2px;   width: 0;  bottom: 1px;   position: absolute;  background: #f4a103;   -webkit-transition:all 0.2s ease;   transition: all 0.2s ease;}
.bar:before { left: 50%; }
.bar:after { right: 50%; }

/* active */
input:focus ~ .bar:before, input:focus ~ .bar:after { width: 50%; }

/* Highlight */
.highlight {  position: absolute;  height: 60%;   width: 100px;   top: 25%;   left: 0;  pointer-events: none;  opacity: 0.5;}

/* active */
input:focus ~ .highlight {  -webkit-animation: inputHighlighter 0.3s ease;          animation: inputHighlighter 0.3s ease;}

/* Animations */
@-webkit-keyframes inputHighlighter {
  from { background: #4a89dc; }
  to  { width: 0; background: transparent; }
}

@keyframes inputHighlighter {
  from { background: #4a89dc; }
  to  { width: 0; background: transparent; }
}

div.background{  position: fixed;    width: 100%;    z-index: -1;    height: 100%;    right: -10%;}
div.background2 {  position: fixed;    width: 100%;    z-index: -1;    height: 100%;    left: 6%;}
div.background:before {    content: '';    position: absolute;    top: 0;    right: 0;    width: 80%;    height: 70%;    /* opacity: 0.8; */    background-color: #ffd34e;    border-bottom: 30px solid #e4bd44;    -webkit-transform-origin: 100% 100%;    -ms-transform-origin: 100% 100%;    transform-origin: 100% 100%;    -webkit-transform: skewX(30deg);    -ms-transform: skewX(30deg);    transform: skewY(30deg);    -webkit-box-sizing: border-box;    -moz-box-sizing: border-box;    box-shadow: 0px 0px 20px #89898a;}
div.background2:before {    content: '';    position: absolute;    bottom: 0;    left: 0;    width: 50%;    height: 100%;     background-color: #ffd34e;    border-right: 50px solid #e4bd44;    -webkit-transform-origin: 100% 100%;    -ms-transform-origin: 100% 100%;    transform-origin: 100% 100%;    -webkit-transform: skewX(60deg);    -ms-transform: skewX(60deg);        transform: skewX(60deg);    -webkit-box-sizing: border-box;    -moz-box-sizing: border-box;    box-shadow: 0px 0px 20px #89898a;}
html, body{   background-size:cover;    margin:0;padding:0;    height:80%;}
.buttonui {   position: relative;    padding: 8px 45px;    line-height: 30px;    overflow: hidden;    border-width: 0;    outline: none;    border-radius: 2px;    box-shadow: 0 1px 4px rgba(0, 0, 0, .6);    background-color: #f4a103;    color: #ecf0f1;    transition: background-color .3s;}
.buttonui:before {    content: "";    position: absolute;    top: 50%;    left: 50%;    display: block;    width: 0;    padding-top: 0;    border-radius: 100%;    background-color: rgba(236, 240, 241, .3);    -webkit-transform: translate(-50%, -50%);    -moz-transform: translate(-50%, -50%);    -ms-transform: translate(-50%, -50%);    -o-transform: translate(-50%, -50%);    transform: translate(-50%, -50%);}
.buttonui span  {    padding: 12px 24px;    font-size:16px;}
.loginForm {   width: 420px;    margin: 0 auto;    z-index: 99;    display: block;    margin-top: 5%;    background: transparent;    border-radius: .25em .25em .4em .4em;    text-align: center;    box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);    color: #fff;}
/* Ripples container */

.ripples {  position: absolute;  top: 0;  left: 0;  width: 100%;  height: 100%;  overflow: hidden;  background: transparent;}
.ripplesCircle {  position: absolute;  top: 50%;  left: 50%;  -webkit-transform: translate(-50%, -50%);          transform: translate(-50%, -50%);  opacity: 0;  width: 0;  height: 0;  border-radius: 50%;  background: rgba(255, 255, 255, 0.25);}
.ripples.is-active .ripplesCircle {  -webkit-animation: ripples .4s ease-in;          animation: ripples .4s ease-in;}

/* Ripples animation */

@-webkit-keyframes ripples {
  0% { opacity: 0; }

  25% { opacity: 1; }

  100% {
    width: 200%;
    padding-bottom: 200%;
    opacity: 0;
  }
}

@keyframes ripples {
  0% { opacity: 0; }

  25% { opacity: 1; }

  100% {
    width: 200%;
    padding-bottom: 200%;
    opacity: 0;
  }
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
</style></head><body>
  <div class="background"></div>
  <div class="background2"></div>
    <div class="loginForm"> 
	<?php //print_r($_SESSION); 
	if(isset($_GET['action']) && $_GET['action'] == 'register') { ?>
    <hgroup>
      <h1>Register</h1>
    </hgroup>
    <form action="" method="post" >
		<?php   if(!empty($reg_errors)) {
					echo '<div class="error">';
					foreach ($register_errors as $error) {
						echo '<p>'.$error.'</p>';
					}
					echo '</div>';
			} ?>
      <div class="group">
        <input type="text" name="voornaam" ><span class="highlight"></span><span class="bar"></span>
        <label>Voornaam</label>
      </div>
	 <div class="group">
        <input type="text" name="tussenvoegsel" ><span class="highlight"></span><span class="bar"></span>
        <label>Tussenvoegsel</label>
      </div>
      <div class="group">
        <input type="text" name="achternaam" ><span class="highlight"></span><span class="bar"></span>
        <label>Achternaam</label>
      </div>
      <div class="group">
        <input type="text" name="adres" ><span class="highlight"></span><span class="bar"></span>
        <label>Adres</label>
      </div>
      <div class="group">
        <input type="text" name="huisnummer" ><span class="highlight"></span><span class="bar"></span>
        <label>Huisnummer</label>
      </div>
      <div class="group">
        <input type="text" name="postcode" ><span class="highlight"></span><span class="bar"></span>
        <label>Postcode</label>
      </div>
      <div class="group">
        <input type="date" name="geboortedatum" style="padding-left:140px;" ><span class="highlight"></span><span class="bar"></span>
        <label>Geboortedatum</label>
      </div>
      <div class="group">
        <input type="text" name="telefoonnummer" ><span class="highlight"></span><span class="bar"></span>
        <label>Telefoonnummer</label>
      </div>
	  <div class="group">
        <input type="email" name="email" ><span class="highlight"></span><span class="bar"></span>
        <label>Email</label>
      </div>
      <div class="group">
        <input type="password" name="password" ><span class="highlight"></span><span class="bar"></span>
        <label>Password</label>
      </div>
	  <input type="hidden" name="register" value="yes" > 
      <button type="submit" class="buttonui "> <span> Register </span>
            <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
       </button> 
		
			<a class="buttonui " href="login.php?action=login" style="line-height:4em; text-decoration: none; padding:2%" > <span> Login Back  </span> <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div></a>
		
    </form>
	<?php //print_r($_SESSION); 
	} elseif(isset($_GET['action']) && $_GET['action'] == 'registered') { ?>
    <hgroup>
      <h1>Registered</h1>
    </hgroup>
	<div style="background:white;">
	<span style="color:#000;line-height:2;">
        Dank u wel voor het registreren.
		Voordat u kunt inloggen moet u uw email verifiëren.
		U heeft een email ontvangen met een link voor de verificatie.
		</span>
	  </div>
<?php } else{ ?>
	<hgroup>
      <h1>Admin Login</h1>
    </hgroup>
    <form action="" method="post" >
	<?php   if(!empty($log_error) || (isset($mismatchErr) && $mismatchErr != '')) {
					echo '<div class="error">';
					foreach ($login_error as $error) {
						echo '<p>'.$error.'</p>';
					}					
					echo $mismatchErr.'</div>';
			} ?>
      <div class="group">
        <input type="text" name="username" ><span class="highlight"></span><span class="bar"></span>
        <label>Email</label>
      </div>
      <div class="group">
        <input type="password" name="password" ><span class="highlight"></span><span class="bar"></span>
        <label>Wachtwoord</label>
      </div>
	  <input type="hidden" name="login" value="yes" >
      <button type="submit" class="buttonui "> <span> Login </span>
            <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
          </button>  
    </form>

	<?php } ?>
  </div>
<script src="http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script>$(window, document, undefined).ready(function() {

  $('input').blur(function() {
    var $this = $(this);
    if ($this.val())
      $this.addClass('used');
    else
      $this.removeClass('used');
  });

  var $ripples = $('.ripples');

  $ripples.on('click.Ripples', function(e) {

    var $this = $(this);
    var $offset = $this.parent().offset();
    var $circle = $this.find('.ripplesCircle');

    var x = e.pageX - $offset.left;
    var y = e.pageY - $offset.top;

    $circle.css({
      top: y + 'px',
      left: x + 'px'
    });

    $this.addClass('is-active');

  });

  $ripples.on('animationend webkitAnimationEnd mozAnimationEnd oanimationend MSAnimationEnd', function(e) {
    $(this).removeClass('is-active');
  });

});

</script>
</body></html>
<?php } ?>