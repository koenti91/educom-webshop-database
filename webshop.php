<?php

require_once ("shopping_cart.php");

function showWebshopHeader() {
    echo 'Headwear';
}

function showWebshopContent($data) {

    foreach($data['products'] as $product) {
        showWebshopProduct($product);
    }
}

function showWebshopProduct($product) {
    echo '<div class="product-list"><form method="post" action="index.php?action=add&id'
            .$product["id"].'><a class="shop-products" href="index.php?page=detail&id='.$product['id'].'">';
    echo '<h4>'.$product['name'].'</h4>';
    echo '<img src="Images/'.$product['filename'].'" alt="'.$product['name'].'" width="100px">';
    echo '<p> €'.$product['price'] . '</p>';
    echo '</a> <input type="text" name="quantity" class="set-quantity" value="1" />';
    echo '<input type="hidden" name="hidden-name" value="'.$product['name'].'">';  
    echo '<input type="hidden" name="hidden-price" value="'.$product['price'].'">';  
    echo '<br><input type="submit" name="add-to-cart" class="btn-btn" value= "Toevoegen aan mandje">';
    echo '</form></div>';

    ;
}

?>