<?php
if(isset($_GET["id"])) {

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "school";
    
    $connection = new mysqli($servername,$username,$password,$database);
    if($connection->connect_error) {
        die("Connection Failed: " . $connection->connect_error);
    }

    $id = $_GET["id"];
    $sql = "DELETE FROM students WHERE id = $id";
    $result = $connection->query($sql);
}
header("location: ./index.php");
exit;
?>