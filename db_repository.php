<?php

function connectDatabase() {

  $servername = "localhost";
  $username = "WebShopUser";
  $password = "Gebruiker098.";
  $dbname = "koens_webshop";
  
  $conn = mysqli_connect($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }

  return $conn;
}

function closeDatabase($conn) {
    mysqli_close($conn);
}

function runQuery($sql) {
    $conn = connectDatabase();

    $result = mysqli_query($conn, $sql);
    $query_result = [];

    if (mysqli_num_rows($result) > 0) {
      while($row = mysqli_fetch_assoc($result)) {
        $query_result[] = $row;
      }
    }

    closeDatabase($conn);

    return $query_result;
}

function findAll($sql) {
  return runQuery($sql);
}

function findOne($sql) {
  $result =  runQuery($sql);

  if (!empty($result[0])) return $result[0];
}

function findUserByEmail($email) {
  return findOne("SELECT * FROM users WHERE email = '$email'");
}

function saveUser($name, $email, $password) {
    $conn = connectDatabase();

    $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registratie gelukt!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
    
    closeDatabase($conn);
}

function changePassword($newPassword, $password, $oldPassword) {
    $conn = connectDatabase();

    $sql = "UPDATE users SET password = '$newPassword' WHERE '$password' = '$oldPassword'";

    if (mysqli_query($conn,$sql)) {
        echo "Wachtwoord gewijzigd.";
    } else {
        echo "Error updating password: " .mysqli_error($conn);
    }

    closeDatabase($conn);
}

?>