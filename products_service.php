<?php

function getWebshopProducts() {
    $products = array();
    $genericErr = "";

    try {
        $products = getAllProducts();
    } catch (Exception $exception) {
        $genericErr = "Excuses, op dit moment kunnen er geen producten worden weergegeven.";
        logError("GetAllProducts failed" .$exception -> getMessage());
    }

    return array("products" => $products, "genericErr" => $genericErr);
}

    /*functionGetProductDetails($productId) {
        // nog invullen
    }*/

?>