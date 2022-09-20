<?php

$servername = "localhost";
$username = "WebShopUser";
$password = "Gebruiker098.";
$dbname = "koens_webshop";

//connect
$conn = mysqli_connect($servername, $username, $password, $dbname);

function connectToDatabase($conn){
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connection successful";
}

$sql = "INSERT INTO users (name, email, password) VALUES ('Johnny', 'johnny@hotmail.com', 'johnnY123.')";

if(mysqli_query($conn, $sql)) {
    echo "Succesvol toegevoegd";
} else {
    echo "Error: " . $sql . "<br>" .mysqli_error($conn);
}

mysqli_close($conn);

/*function findUserByEmail($email) {

}

function saveUser($name, $email, $password) {

}
*/
?>