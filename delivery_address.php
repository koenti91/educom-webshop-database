<?php

function showDeliveryAddressHeader() {
    echo 'Afleveradres';
}

function chooseDeliveryAddress($data) {
    echo '<h3> Jouw gegevens: </h3>';
    
    echo '<fieldset>';
    echo 'Naam: '.$data['user']["name"];
    echo '<br>';
    echo 'E-mailadres: '.$data['user']["email"];
    echo '<br>';
    echo '</fieldset>';
    
    if (count($data['addresses']) > 0) {
        echo '<form action="index.php" method="post">
        <fieldset>
        <label for="delivery-address"><b>Afleveradres: </b></label>
            <select class="delivery-address" name="delivery-address" id="delivery-address" required>
            <option value="">Vul een nieuw afleveradres in</option>';
            foreach ($data['addresses'] as $address) {
                $selected = $address['is_default'] ? ' selected' : '';
                echo '<option value="'.$address['id'].'" '.$selected.'>'.$address['street'].' '.$address['city'].'</option>';
            }
        echo '
        </select>
        <span class="error">* ' . $data["addressErr"] ?? '' . '</span>
        </fieldset>
        <button class="submit" type="submit">Bevestigen</button>
        </form>';
    }
    
   
}

function addNewDeliveryAddress($data) {      
    echo '<form action="index.php" method="post">
        <fieldset>
            <div>
                <label for ="address"><b>Adres: </b></label>
                <input type="text" name="address" placeholder="Hoofdstraat 1" maxlength="100" value="'. getArrayVar($data, "address"). '" required>
                <span class="error">* ' . getArrayVar($data, "addressErr") . '</span>
            </div>
            <div>
                <label for ="zip_code"><b>Postcode: </b></label>
                <input type="text" name="zip-code" placeholder="1234AB" maxlength="6" value="' . getArrayVar($data, "zipCode"). '" required>
                <span class="error">* ' . getArrayVar($data, "zipCodeErr"). '</span> 
            </div>
            <div>
                <label for ="city"><b>Woonplaats: </b></label>
                <input type ="text" name="city" placeholder="Meerdijk" maxlength="100" value="' . getArrayVar($data, "city"). '" required>
                <span class="error">* ' . getArrayVar($data, "cityErr"). '</span>
            </div>
            <div>
                <label for ="phone"><b>Telefoon: </b></label>
                <input type ="tel" name="phone" placeholder="0612345678" maxlength="10" value="' . getArrayVar($data, "phone"). '" required>
                <span class="error">* ' . getArrayVar($data, "phoneErr"). '</span>
            </div>
        </fieldset>
        <button class="submit" type="submit">Bevestigen</button>
        <input type="hidden" name="page" value="confirm_order" />
        <input type="hidden" name="action" value="delivery_address" />
    </form>
    ';
}

?>