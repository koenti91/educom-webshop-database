<?php

function showChangePwHeader() {
    echo ' Wachtwoord veranderen';
}

function showChangePwForm($data) {
    echo '
   <h3> Wachtwoord veranderen</h3>

    <form action="changepw.php" method="post">
							
    <fieldset>
        <label for="current-password"><b>Oud wachtwoord: </b></label>
        <input class="password" type="password" name="current-password" id="current-password" maxlength="50" required>
        <span class="error">* '. $data["oldPasswordErr"] .' </span>
        <br>
        <label for="new-password"><b>Nieuw wachtwoord: </b></label>
        <input class="password" type="password" name="new-password" id="new-password" maxlength="50" required>
        <span class="error">* '. $data["newPasswordErr"] .' </span>
        <br>
        <label for="new-password"><b>Herhaal nieuw wachtwoord: </b></label>
        <input class="password" type="password" name="new-password2" id="new-password2" maxlength="50" required>
        <span class="error">* '. $data["repeatNewPasswordErr"] .' </span>
        </fieldset>
        <button type="submit">Change password</button>
    
</form>';
}

function showChangePwConfirmationMessage($data) {
    echo
    '<p> Je wachtwoord is gewijzigd.</p>';
}
?>