<?php

function doLoginUser($name, $userId) {
    $_SESSION['login'] = $name; 
    $_SESSION['loggedInUserId'] = $userId;
}

function isUserLoggedIn() {
    return isset($_SESSION['login']);
}

function getLoggedInUsername() {
    return $_SESSION['login'];
}

function getLoggedInUserID() {
    return $_SESSION['loggedInUserId'];
}

function doLogoutUser() {
    unset($_SESSION['login']);
}

?>