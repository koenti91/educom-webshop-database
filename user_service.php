<?php

function authenticateUser($email, $password) {
    $user = findUserbyEmail($email);
    return authenticateUserByUser($user, $password);
}

 function authenticateUserByID($userId, $password) {
    $user = findUserById($userId);
    return authenticateUserByUser($user, $password);
}
 
function authenticateUserByUser($user, $password) {
    if (empty($user)) {
        return NULL;
    }
    if (password_verify($password, $user['password'])) {
        return $user;
    }
    return NULL;
}
function doesUserExist($email) {
    $user = findUserbyEmail($email);
    return !empty($user);
}

function storeUser($name, $email, $password) {
    $options = [12];
    $hashedPassword = password_hash ($password, PASSWORD_BCRYPT, $options);
    saveUser($name, $email, $hashedPassword);
}

function storeNewPassword($userId, $newPassword) {
    $options = [12];
    $hashedPassword = password_hash ($newPassword, PASSWORD_BCRYPT, $options);
    changePassword($userId, $hashedPassword);
}

?>