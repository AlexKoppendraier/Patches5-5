<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
    switch($_GET["action"]) {
        case "add":
            if(!empty($_POST["quantity"])) {
                $productByCode = $db_handle->runQuery("SELECT * FROM product WHERE Product_id='" . $_GET["code"] . "';");
                $itemArray = array($productByCode[0]["Product_id"]=>array('name'=>$productByCode[0]["product_name"], 'code'=>$productByCode[0]["Product_id"], 'quantity'=>$_POST["quantity"], 'price'=>$productByCode[0]["prodcuct_prijs"]));

                if(!empty($_SESSION["cart_item"])) {
                    if(in_array($productByCode[0]["Product_id"],array_keys($_SESSION["cart_item"]))) {
                        foreach($_SESSION["cart_item"] as $k => $v) {
                            if($productByCode[0]["Product_id"] == $k) {
                                if(empty($_SESSION["cart_item"][$k]["quantity"])) {
                                    $_SESSION["cart_item"][$k]["quantity"] = 0;
                                }
                                $_SESSION["cart_item"][$k]["quantity"] += $_POST["quantity"];
                            }
                        }
                    } else {
                        $_SESSION["cart_item"] = array_merge($_SESSION["cart_item"],$itemArray);
                    }
                } else {
                    $_SESSION["cart_item"] = $itemArray;
                }
            }
            break;
        case "remove":
            if(!empty($_SESSION["cart_item"])) {
                foreach($_SESSION["cart_item"] as $k => $v) {
                    if($_GET["code"] == $k)
                        unset($_SESSION["cart_item"][$k]);
                    if(empty($_SESSION["cart_item"]))
                        unset($_SESSION["cart_item"]);
                }
            }
            break;
        case "empty":
            unset($_SESSION["cart_item"]);
            break;
    }
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

<?php

if(isset($_SESSION["cart_item"])){
    $item_total = 0;
    ?>
    <table cellpadding="10" cellspacing="1">
        <tbody>
        <tr>
            <th style="text-align:left;"><strong>Naam</strong></th>
            <th style="text-align:left;"><strong>        </strong></th>
            <th style="text-align:right;"><strong>Aantal</strong></th>
            <th style="text-align:right;"><strong>Prijs</strong></th>

        </tr>
        <?php
        foreach ($_SESSION["cart_item"] as $item){
            ?>
            <tr>
                <td style="text-align:left;border-bottom:#f02b36 1px solid;"><strong><?php echo $item["name"]; ?></strong></td>
                <td style="text-align:left;border-bottom:#28f00b 1px solid;"><strong>        </strong></th; ?></td>
                <td style="text-align:right;border-bottom:#F0F0F0 1px solid;"><?php echo $item["quantity"]; ?></td>
                <td style="text-align:right;border-bottom:#f049d8 1px solid;"><?php echo "€".$item["price"]; ?></td>
                <td style="text-align:center;border-bottom:#F0F0F0 1px solid;"><a href="cartsession.php?action=remove&code=<?php echo $item["code"]; ?>" class="buttonform">Verwijder product</a></td>
            </tr>
            <?php
            $item_total += ($item["price"]*$item["quantity"]);
        }
        ?>

        <tr>
            <td colspan="5" align=right><strong>Total:</strong> <?php echo "€".$item_total; ?></td>
        </tr>
        </tbody>
    </table>
    <?php
}
?>
<div id="shopping-cart">
    <div class="txt-heading">Winkelwagen <a id="btnEmpty" href="cartsession.php?action=empty">Leeg winkelwagen</a></div>
    <?php
    if(isset($_SESSION["cart_item"])){
    $item_total = 0;
    ?>
    <table cellpadding="10" cellspacing="1">
        <tbody>
        </tr>
        <?php
        foreach ($_SESSION["cart_item"] as $item){
            ?>

            <?php
            $item_total += ($item["price"]*$item["quantity"]);
        }
        ?>

        <tr>
            <td colspan="5" align=right><strong>Total:</strong> <?php echo "€".$item_total; ?></td>
        </tr>
        </tbody>
    </table>
<?php
}