<?php

function showLastCheckHeader() {
    echo '<h3> Bestelgegevens </h3>';
}

function showLastCheckContent() {
    // $rows = getShoppingCartRows();

    $user = findUserByID($_SESSION['loggedInUserId']);
    $addresses = findDeliveryAddresses($_SESSION['loggedInUserId']);

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
    echo '</div>';
}
?>