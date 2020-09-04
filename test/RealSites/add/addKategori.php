<?php
//variabler jag använde
$servername = "localhost";
$username = "root";
$password = "";
$database = "webshop";

// Skapa kopling till server
$mysqli = new mysqli($servername,$username,$password,$database);

$kategori=$_POST["kategori"];

$data;
    if(isset($_GET["kategori"]))
    {
        $data = $_GET["kategori"];
    }
    if($data==null){
        //header('Location: ' . $_SERVER['HTTP_REFERER']);
    }


//Skapa kommandot för att hämta användarnamn och lösenord för servern
$sql = "insert into specifikation(product_ID,product_specifikation) VALUES($data, '$kategori')";

//Aktivera komandot
$query = $mysqli->query($sql);



    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>