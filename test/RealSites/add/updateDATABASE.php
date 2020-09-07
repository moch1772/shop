<?php
//variabler jag använde
$servername = "localhost";
$username = "root";
$password = "";
$database = "webshop";

// Skapa kopling till server
$mysqli = new mysqli($servername,$username,$password,$database);

$price=$_POST["price"];
$amount=$_POST["amount"];
$INFO=$_POST["info"];
$Players=$_POST["Players"];
$age=$_POST["age"];
$time=$_POST["time"];

$data;
    if(isset($_GET["product"]))
    {
        $data = $_GET["product"];
    }
    if($data==null){
        //header('Location: ' . $_SERVER['HTTP_REFERER']);
    }


//Skapa kommandot för att hämta användarnamn och lösenord för servern
$sql = "UPDATE product SET price = $price, amount = $amount, info = '$INFO', players = '$Players', age = $age, time = '$time' WHERE ID = $data;";
var_dump($sql);
//Aktivera komandot
$query = $mysqli->query($sql);



    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>