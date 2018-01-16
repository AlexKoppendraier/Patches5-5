<div id="product-grid">
    <div class="txt-heading">Producten</div>
    <?php
    $product_array = $db_handle->runQuery("SELECT * FROM product ORDER BY code ASC");
    if (!empty($product_array)) {
        foreach($product_array as $key=>$value){
            ?>
            <div class="product-item">
                <form method="post" action="index.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
                    <div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>"></div>
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

<div class="productview">

    <?php
    $sql = "SELECT Product_id, product_name, prodcuct_prijs FROM product WHERE thema LIKE '$thema' AND NOT Product_id = '$Product_id' LIMIT 5";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
            $Product_id = $row['Product_id'];
            echo "<div class=\"product\">
                    
					<a href=product.php?Product_id=$Product_id>
                    <img src=\"GetProductImage.php?Product_id=$Product_id\", width='' =\"150\", height=\"150\"></img>
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

<?php
$product_array = $db_handle->runQuery("SELECT * FROM product ORDER BY code ASC");
if (!empty($product_array)) {
foreach($product_array as $key=>$value){
?>
<div class="product-item">
    <form method="post" action="index.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
        <div class="product-image"><img src="<?php echo $product_array[$key]["image"]; ?>"></div>
        <div><input type="text" name="quantity" value="1" size="2" /><input type="submit" value="voeg to aan winkelwagen" class="buttonform" /></div>
    </form>
</div>
    <?php
}
}
?>