<?php

function showDeliveryAddressHeader() {
    echo 'Afleveradres';
}

function chooseDeliveryAddress($data) {
    echo '<h3> Jouw gegevens: </h3>';
    
    echo '<fieldset>';
    echo 'Naam: '.$data["name"];
    echo '<br>';
    echo 'E-mailadres: '.$data["email"];
    echo '<br>';
    echo '</fieldset>';

    echo '<form action="index.php" method="post">
        <fieldset>
        <label for="delivery-address"><b>Afleveradres: </b></label>
            <select class="delivery-address" name="delivery-address" id="delivery-address" required>
            <option value="existing-address" selected>Bestaand</option>
            <option value="0">Vul een nieuw afleveradres in</option>
            <span class="error">* ' . $data["addressErr"] . '</span>
        </fieldset>';
}

function addNewDeliveryAddress($data) {        
    echo '<form action="index.php" method="post">
        <fieldset>
            <label for ="address"><b>Adres: </b></label>
            <input type="text" name="address" placeholder="Hoofdstraat 1" maxlength="100" value="'. $data["address"] . '" required>
            <span class="error">* ' . $data["addressErr"] . '</span>
            <label for ="zip-code"><b>Postcode: </b></label>
            <input type="text" name="zip-code" placeholder="1234AB" maxlength="6" value="' . $data["zipCode"] . '" required>
            <span class="error">* ' . $data["zipCodeErr"] . '</span> 
            <label for ="city"><b>Woonplaats: </b></label>
            <input type ="text" name="city" placeholder="Meerdijk" maxlength="100" value="' . $data["city"] . '" required>
            <span class="error">* ' . $data["cityErr"] . '</span>
            <label for ="phone"><b>Telefoon: </b></label>
            <input type ="tel" name="phone" placeholder="0612345678" maxlength="10" value="' . $data["phone"] . '" required>
            <span class="error">* ' . $data["phoneErr"] . '</span>
        </fieldset>
        <input class="submit" name="submit" value="Bevestigen">
        <input type="hidden" name="confirm-address" value="confirm-address" />
    </form>
    ';
}

?>