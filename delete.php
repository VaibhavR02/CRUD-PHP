<?php
if(isset($_GET["id"])){
    $id=$_GET["id"];

    $servername="localhost";
$username="root";
$password="Root@123";
$database="crud";

$connection= new mysqli($servername, $username , $password , $database);

$sql="DELETE FROM students WHERE id=$id";
$connection->query($sql);

}
header("location: /crud/index.php");
exit;


?>