<?php
// used to connect to the database
$host = "127.0.0.1";
$db_name = "Recipe";
$username = "root";
$password = "0055";
 
try {
    $con = new PDO("mysql:host={$host};dbname={$db_name}", $username, $password);
}
 
// show error
catch(PDOException $exception){
    echo "Connection error: " . $exception->getMessage();
}
?>
