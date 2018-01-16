<?php
session_start();
require_once("dbcontroller.php");
$db_handle = new DBController();
if(!empty($_GET["action"])) {
    switch($_GET["action"]) {
        case "add":
            if(!empty($_POST["quantity"])) {
                $productByProduct_id = $db_handle->runQuery("SELECT * FROM product WHERE Product_id='" . $_GET["Product_id"] . "';");
                $itemArray = array($productByProduct_id[0]["Product_id"]=>array('name'=>$productByProduct_id[0]["product_name"], 'Product_id'=>$productByProduct_id[0]["Product_id"], 'quantity'=>$_POST["quantity"], 'price'=>$productByProduct_id[0]["prodcuct_prijs"]));

                if(!empty($_SESSION["cart_item"])) {
                    if(in_array($productByProduct_id[0]["Product_id"],array_keys($_SESSION["cart_item"]))) {
                        foreach($_SESSION["cart_item"] as $k => $v) {
                            if($productByProduct_id[0]["Product_id"] == $k) {
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
				header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
            break;
        case "remove":
            if(!empty($_SESSION["cart_item"])) {
                foreach($_SESSION["cart_item"] as $k => $v) {
                    if($_GET["Product_id"] == $k)
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
<HTML>
<HEAD>
    <TITLE>webshop</TITLE>
    <link href="css.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>


</div>
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
                <div class="button basketbar"><a href="cartsession.php"><img style="height:45px;" src="img/cart.png"></img></a></div>

        </div>

        </form>	</div>
    <nav id="nav">
        <label for="show-menu" class="show-menu">Toon Menu</label>
        <input type="checkbox" id="show-menu" role="button">
        <ul id="menu">
            <li><a href="categorieen.html">Categorieën</a></li>
            <li><a href="http://test.com">Eigen Ontwerp</a></li>
            <li><a href="about.html">Over Ons</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="login.html">Inloggen</a></li>
            <li class="searchbarmobile"><form>
                    <input class="search" type="text" placeholder="Waar ben je naar op zoek?" required>
                    <input class="button" type="button" value="Zoeken">
                </form></li>
        </ul>
    </nav>
</header>



<footer>
    <p>&copy;2014 Copyright info here...</p>
</footer>

</body>
----

<div id="product-grid">
    <div class="txt-heading">Producten</div>
    <?php
    $product_array = $db_handle->runQuery("SELECT * FROM product ORDER BY Product_id ASC");
    if (!empty($product_array)) {
        foreach($product_array as $key=>$value){
            ?>
            <div class="product-item">
                <form method="post" action="index.php?action=add&Product_id=<?php echo $product_array[$key]["Product_id"]; ?>">
                    <div class="product-image"><?php echo" <img src=\"GetProductImage.php?Product_id=".$product_array[$key]["Product_id"]."\" height=\"150\"></img> "; ?>

                    <div><strong><?php echo $product_array[$key]["product_name"]; ?></strong></div>
                    <div class="product-price"><?php echo "€".$product_array[$key]["prodcuct_prijs"]; ?></div>
                    <div><input type="text" name="quantity" value="1" size="2" /><input type="submit" value="voeg to aan winkelwagen" class="buttonform" /></div>
                </form>
            </div>
            <?php
        }
    }
    ?>

</div>
</BODY>
</HTML>