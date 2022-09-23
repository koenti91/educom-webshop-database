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

function runQuery($sql, $types='', $params=array()) {
    $conn = connectDatabase();

    $stmt = mysqli_prepare($conn, $sql);
    if(!empty ($params)) {
    mysqli_stmt_bind_param($stmt, $types, $params);
    }

    mysqli_stmt_execute($stmt);
    $metaResults = mysqli_stmt_result_metadata($stmt);
    $fields = mysqli_fetch_fields($metaResults);
    $statementParams='';
    $column = array();
    //build the bind_results statement dynamically so I can get the results in an array
    foreach($fields as $field){
        if(empty($statementParams)){
            $statementParams.="\$column['".$field->name."']";
        }else{
            $statementParams.=", \$column['".$field->name."']";
        }
    }
    $statement="mysqli_stmt_bind_result(\$stmt, $statementParams);";
    var_dump($statement);
    eval($statement);
    $query_result = [];

    if (mysqli_stmt_num_rows($stmt) > 0) {
      while(mysqli_stmt_fetch($stmt)) {
        $row = array ($column);
        var_dump($row);
        $query_result[] = $row;
      }
    }

    closeDatabase($conn);

    return $query_result;
}

function findAll($sql) {
  return runQuery($sql);
}

function findOne($sql, $types, $params) {
  $result =  runQuery($sql, $types, $params);

  if (!empty($result[0])) return $result[0];
}

function findUserByEmail($email) {
  return findOne("SELECT * FROM users WHERE email = ?", "s", array($email));
}

function findUserByID($userId){
    return findOne("SELECT * FROM users WHERE id = ?", "i", array($userId));
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

function changePassword($userId, $newPassword) {
    $conn = connectDatabase();

    $sql = "UPDATE users SET password = '$newPassword' WHERE id = $userId";

    if (mysqli_query($conn,$sql)) {
        echo "Wachtwoord gewijzigd.";
    } else {
        echo "Error updating password: " .mysqli_error($conn);
    }

    closeDatabase($conn);
}

?>