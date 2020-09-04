<?php
//variabler jag använde
$servername = "localhost";
$username = "root";
$password = "";
$database = "webshop";

// Skapa kopling till server
$mysqli = new mysqli($servername,$username,$password,$database);

$data;
    if(isset($_GET["kategori"]))
    {
        $data = $_GET["kategori"];
    }
    if($data==null){
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }


//Skapa kommandot för att hämta användarnamn och lösenord för servern
$sql = "DELETE FROM specifikation WHERE ID=$data";
//echo $sql;

//Aktivera komandot
$query = $mysqli->query($sql);



    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>