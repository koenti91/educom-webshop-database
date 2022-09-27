<?php

function showWebshopHeader() {
    echo 'Headwear';
}

function showWebshopContent($data) {
    echo '<div class="list">';

    foreach($data['products'] as $product) {
        showWebshopProduct($product);
    }

    echo '</div>';
}



function showWebshopProduct($product) {
    echo '<a class="shop-products" href="index.php?page=detail&id='.$product['id'].'">';
    echo '<h4>'.$product['name'].'</h4>';
    echo '<img src="Images/'.$product['filename'].'" alt="'.$product['name'].'" width="100px">';
    echo '<p> €'.$product['price'] . '</p>';
    echo '</a>';
}

?>