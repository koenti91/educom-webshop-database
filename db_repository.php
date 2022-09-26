<?php

function connectDatabase() {

  $servername = "localhost";
  $username = "WebShopUser";
  $password = "Gebruiker098.";
  $dbname = "koens_webshop";
  
  $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        throw new Exception("Could not connect to database." . mysqli_connect_error());
      }

  return $conn;
}

function closeDatabase($conn) {
    mysqli_close($conn);
}

function findAll($conn, $sql) {
    try {
        $result = runQuery($conn, $sql);
        $resultarray = [];
        while ($row = mysqli_fetch_assoc($result)){
            $resultarray [$row["id"]] = $row;
        }
        return $resultarray;
    } 
    finally {
        closeDatabase($conn);
    }
}

function runQuery($conn, $sql) {

    $result = mysqli_query($conn, $sql);
        
    if(!$result) {
        throw new Exception("Find user query failed, SQL: " . $sql. "error" .mysqli_error($conn));
    }
    return $result;
}

function executeQuery($conn, $sql) { 
    try {
        runQuery($conn, $sql);
        
        return mysqli_insert_id($conn);
    }

    finally {
        closeDatabase($conn);
    }
}

function findOne($conn, $sql) {
    try {
        $result = runQuery($conn, $sql);
        
        return mysqli_fetch_assoc($result);
    }

    finally {
        closeDatabase($conn);
    }
}

function findUserByEmail($email) {
    $conn = connectDatabase();

    $email = mysqli_real_escape_string($conn, $email);
    $sql = "SELECT * FROM users WHERE email = '". $email ."'";

    return findOne($conn, $sql);
}

function findUserByID($userId){
    $conn = connectDatabase();

    $userId = mysqli_real_escape_string($conn, $userId);
    $sql = "SELECT * FROM users WHERE id = '". $userId ."'";
    
    return findOne($conn, $sql);
}

function saveUser($name, $email, $password) {
    $conn = connectDatabase();
    
    $name = mysqli_real_escape_string($conn, $name);
    $email = mysqli_real_escape_string($conn, $email);
    $password = mysqli_real_escape_string($conn, $password);
    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

   return executeQuery($conn, $sql);
}

function changePassword($userId, $newPassword) {
    $conn = connectDatabase();

    $newPassword = mysqli_real_escape_string($conn, $newPassword);
    $userId = mysqli_real_escape_string($conn, $userId);
    $sql = "UPDATE users SET password = '$newPassword' WHERE id = $userId";

    executeQuery($conn, $sql);
}

function getAllProducts() {
    $conn = connectDatabase();

    $sql = "SELECT id, name, description, price FROM products";
    $result = mysqli_query($conn, $sql);

    while ($row = mysqli_fetch_assoc($result) > 0) {
        echo "id: " . $row["id"]. " Name: " . $row["name"]. " " . $row["description"]. " 
    }
}

/*function getProductDetails () {

}*/

?>