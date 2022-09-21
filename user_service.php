<?php

function authenticateUser($email, $password) {
    $user = findUserbyEmail($email);

    if (empty($user)) {
        return NULL;
    }
    if (trim($password) == trim($user['password'])) {
        $_SESSION["email"] = $user['email'];
        return $user;
    }
    return NULL;
}

function doesUserExist($email) {
    $user = findUserbyEmail($email);
    return !empty($user);
}

function storeUser($name, $email, $password) {
    saveUser($name, $email, $password);
}

?>