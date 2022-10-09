<?php

function showLastCheckHeader() {
    echo '<h3> Bestelgegevens </h3>';
}

function showLastCheckContent($cartRow) {
    $user = findUserByID($_SESSION['loggedInUserId']);
    $addresses = findDeliveryAddresses($_SESSION['loggedInUserId']);
    $rows = getShoppingCartRows();
    $address = null;
    foreach ($addresses as $key => $value) {
        $address = $value;    
    }

    echo '<h3> Bestelgegevens :</h3>';
    echo '<br>';
    echo '<div class="order-info">';
    echo '<fieldset>';
    echo 'Naam: '.$user["name"];
    echo '<br>';
    echo 'E-mailadres: '.$user["email"];
    echo '<br>';
    echo 'Telefoonnummer: 0'.$address["phone"];
    echo '<br>';
    echo 'Adres: '.$address["address"];
    echo '<br>';
    echo 'Postcode: '.$address["zip_code"];
    echo' <br>';
    echo 'Woonplaats: '.$address["city"];
    echo '<br>';
    echo '</fieldset>';
    echo '<fieldset>';
    echo ''.$rows["productId"];
    echo '<br>';
    echo ''.$rows["productName"];
    echo '<br>';
    echo ''.$rows["price"];
    echo '<br>';
    echo ''.$rows;["quantity"];
    echo '<br>';
    echo ''.$rows;["subtotal"];
    echo '<br>';
    echo '</fieldset>';
    echo '<input class="submit" name="submit" type="submit" value="Bestelling afronden">';
    echo '<input type="hidden" name="action" value="orderConfirmation"';
    echo '<input type="hidden" name="page" value="orderConfirmation" />';
    echo '</div>';
}
?>