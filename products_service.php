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

function addToCart() {
    if(isset($_POST["add-to-cart"])) {

        if(isset($_SESSION["shopping-cart"])) {
            $productArrayId = array_column($_SESSION["shopping-cart"], "productId");

            if(!in_array($_GET["id"], $productArrayId)) {
                $count = count($_SESSION["shopping-cart"]);
                $productArray = array(
                    'productId' => $_GET["id"],
                    'productName' => $_POST["hidden-name"],
                    'productPrice' => $_POST["hidden-price"],
                    'productQuantity' => $_POST["quantity"]
                );
                $_SESSION["shopping-cart"][$count] = $productArray;
             } else {
                echo '<p>Dit product is al toegevoegd.</p>';
                //redirect;
            }

        } else {
        $productArray = array (
            'productId' => $_GET["id"],
            'productName' => $_POST["hidden-name"],
            'productPrice' => $_POST["hidden-price"],
            'productQuantity' => $_POST["hidden-quantity"]
        );
        $_SESSION["shopping-cart"] [0] = $productArray;
        }
    }

    if(isset($_GET["action"])) {
        
        if ($_GET["action"] == "delete") {
            foreach($_SESSION["shopping-cart"] as $keys => $values) {
                if ($values["productId"] == $_GET["id "]) {
                    unset($_SESSION["shopping-cart"] [$keys]);
                    echo '<p>Product uit mandje verwijderd.</p>';
                    //redirect
                }
            }
        }
    }
}

?>