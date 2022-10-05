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

function handleActionForm() {
    $data = NULL;
    $action = getPostVar("action");
    switch ($action) {
    case "add-to-cart":
        $productId = getPostVar("product-id");
        $quantity = getPostVar("quantity");

        addToCart($productId, $quantity);
        break;

    case "delete":
        $productId = getPostVar("product-id");
        deleteFromCart($productId);
        break;
    
    // case "order":
    //     $userId = getLoggedInUserID();
    //     $data = getShoppingCartRows();
    //     $data = storeOrder($userId, $data["cartRows"]);
    //     break;
    case "delivery_address":
        $userId = getLoggedInUserID();
        $address = getPostVar("address");
        $zipCode = getPostVar("zipCode");
        $city = getPostVar("city");
        $phone = getPostVar("phone");
        
        $input = array(
            'address' => $address,
            'zipCode' => $zipCode,
            'city' => $city,
            'phone' => $phone,
        );

        $delivery_address_id = storeDeliveryAddress($userId, $input);
        $delivery_address = findDeliveryById($userId, $delivery_address_id);
        $cartRows = getShoppingCartRows();     

        storeOrder($userId, $delivery_address, $data["cartRows"]);

        break;
    }
    return $data;
}

function getShoppingCartRows() {
    $cartRows = array();
    $total = 0;
    $genericErr = "";

    try {
        $cart = getShoppingCart();
        $products = getAllProducts();

        foreach ($cart as $productId => $quantity) {
            $product = getArrayVar($products, $productId, null);
            if ($product == null) {
                continue;
            }
            $priceInCents = intVal($product['price'] * 100); 
            $subtotal = $priceInCents * $quantity;
            $cartRow = array( 'productId' => $productId, 'quantity' => $quantity, 'subtotal' => $subtotal, 
                              'price' => $priceInCents, 'name' => $product['name'], 'filename' => $product['filename']);
            $cartRows[] = $cartRow;
            $total += $subtotal; // $total = $total + $subtotal;
        }
    } catch (Exception $exception) {
        $genericErr = "Excuses, op dit moment kunnen er geen producten worden weergegeven.";
        logError("GetAllProducts failed" .$exception -> getMessage());
    }

    return array("cartRows" => $cartRows, "total" => $total, "genericErr" => $genericErr);
}

function storeOrder($userId, $deliveryAddress, $cartRows) {
    $genericErr = "";
    
    try {
    saveOrder($userId, $deliveryAddress, $cartRows);
    emptyCart();
   } catch (Exception $exception) {
        $genericErr = 'Excuses, op dit moment lukt het niet om je bestelling te verwerken.';
        logError("saveOrder failed" .$exception -> getMessage());
   }
   return array("genericErr" => $genericErr);
}

?>