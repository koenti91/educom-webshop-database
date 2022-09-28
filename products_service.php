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

function GetProductDetails($productId) {
        
    $product = NULL;
    $genericErr = "";

    try {
        $product = findProductById($productId);
    } catch (Exception $exception) {
        $genericErr = "Excuses, op dit moment kunnen er geen producten worden weergegeven.";
        logError("GetAllProducts failed" .$exception -> getMessage());
    }

    return array("product" => $product, "genericErr" => $genericErr);
}



?>