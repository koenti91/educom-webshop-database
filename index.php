<?php

session_start();

require_once ("constants.php");
require_once ("session_manager.php");
require_once ("validations.php");
require_once ("db_repository.php");
require_once ("user_service.php");
require_once ("products_service.php");

// Main
$page = getRequestedPage();
$data = processRequest($page);
showResponsePage($data);
// Functions

function logError($msg) {
    echo "LOG TO SERVER: " . $msg;
}

function processRequest($page) {
    switch ($page) {
        case "login":
            $data = validateLogin();
            if ($data['valid']) {
                doLoginUser($data['name'], $data['userId']);
                $page = 'home';
            }
            break;

        case 'logout':
            doLogoutUser();
            $page = 'home';
            break;

        case 'contact':
            $data = validateContact();
            if($data['valid']) {
                $page = 'thanks';
            }
            break;
            
        case 'register':
            $data = validateRegister();
            if ($data['valid']) {
                storeUser($data["name"], $data["email"], $data["password"]);
                $page = 'login';
            }
            break;

        case 'changepw':
            $data = validateChangePassword();
            if ($data['valid']) {
                storeNewPassword(getLoggedInUserId(), $data["newPassword"]);
                $page = 'changePwConfirmation';
            }
            break;
    }

    $data['page'] = $page;

    return $data;
}

function showContent($data) {
    switch ($data['page']) {
        case 'home':
            showHomeContent($data);
            break;

        case 'about':
            showAboutContent($data);
            break;

        case 'contact':
            showContactForm($data);
            break;

        case 'thanks':
            showContactThanks($data);
            break;

        case 'login':
            showLoginForm($data);
            break;

        case 'register':
            showRegisterForm($data);
            break;

        case'changepw':
            showChangePwForm($data);
            break;
            
        case 'changePwConfirmation':
            showChangePwConfirmationMessage($data);
            break;

        case 'webshop':
            $data = getWebshopProducts();
            break;

        case 'detail':
            $data = getProductDetails($id);
            break;

    }
}

function getRequestedPage()
{
    $requested_type = $_SERVER['REQUEST_METHOD'];
    if ($requested_type == 'POST') 
    {
        $requested_page = getPostVar('page','home');
    }
    else
    {
        $requested_page = getUrlVar('page','home');
    }
    return $requested_page;
}

function showResponsePage($data) {
    
    beginDocument();
    showHeadSection($data);
    showBodySection($data);
    endDocument();
}

function getArrayVar($array, $key, $default ='')
{
    return isset($array[$key]) ? $array[$key] : $default;
}

function getPostVar($key, $default ='')
    {    
    return getArrayVar($_POST, $key, $default);
}

function getUrlVar($key, $default = '')
{
    return getArrayVar($_GET, $key, $default);
}

function beginDocument()
{
    echo '<!doctype html>
    <html>';
}

function showHeadSection($data)
{
    echo '<head> <title>';
    switch ($data['page'])
    {
        case 'home':
            require_once('home.php');
            showHomeHeader();
            break;
        case 'about':
            require_once('about.php');
            showAboutHeader();
            break;
        case 'contact':
            require_once('contact.php');
            showContactHeader();
            break;
        case 'register':
            require_once('register.php');
            showRegisterHeader();
            break;
        case 'login':
            require_once('login.php');
            showLoginHeader();
            break;
        case 'changepw':
        case 'changePwConfirmation':
            require_once('changepw.php');
            showChangePwHeader();
            break;
        case 'webshop':
            require_once('webshop.php');
            showWebshopHeader();
            break;
        default:
            echo 'Error: Page NOT found';
    }
    echo '</title> <link rel="stylesheet" href="css/stylesheet.css"> </head>';
}

function showBodySection($data)
{
    echo '<body>';
    showHeader($data);
    showMenu();
    showContent($data);
    showFooter();
    echo '</body>';
}

function showHeader($data) {   
    echo ' <header>';
    switch ($data['page'])
    {
        case 'home':
            require_once('home.php');
            showHomeHeader();
            break;
        case 'about':
            require_once('about.php');
            showAboutHeader();
            break;
        case 'contact':
            require_once('contact.php');
            showContactHeader();
            break;
        case 'register':
            require_once('register.php');
            showRegisterHeader();
            break;
        case 'login':
            require_once('login.php');
            showLoginHeader();
            break;
        case 'changepw':
        case 'changePwConfirmation':
            require_once('changepw.php');
            showChangePwHeader();
            break;
        case 'webshop':
            require_once('webshop.php');
            showWebshopHeader();
            break;
        default:
            echo 'Error: Page not found';
    }
    echo '</header>';
}

function showMenu()
{
    echo '<div class="menu"><ul class="nav-tabs">';

    echo showMenuItem('home', 'Home'); 
    echo showMenuItem('about', 'About'); 
    echo showMenuItem('contact', 'Contact'); 
    echo showMenuItem('webshop', 'Winkel');

    if (isUserLoggedIn()) {
        echo showMenuItem("logout", "Logout " . getLoggedInUsername());
        echo showMenuItem("changepw", "Wachtwoord veranderen");
    } else {
        echo showMenuItem ("login", "Login");
        echo showMenuItem ("register", "Registreer");
    }

    echo '</ul></div>';
}

function showMenuItem($page, $label) {
    return '<li><a href="index.php?page='.$page.'">'.$label.'</a></li>';
}

function showFooter()
{
    echo '<footer>';
    echo '<p class="copyright">&copy; 2022 Koen Tiepel</p>';
    echo '</footer>';
}

function endDocument()
{
    echo '</html>';
}

?>