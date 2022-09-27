<?php

function showDetailContent($data) {
    echo '<div class="list">';

    showProductDetail($data['product']);

    echo '</div>';
}

function showProductDetail($product) {
    echo '<h4>'.$product['name'].'</h4>';
    echo '<img src="Images/'.$product['filename'].'" alt="'.$product['name'].'" width="170px">'; 
    echo '<p> €'.$product['price'] . '</p>';
    echo '<p>'.$product['description'].'</p>'; 
}
?>