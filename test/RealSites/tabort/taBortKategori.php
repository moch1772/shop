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

//Hämtar användarnamn och lösenord för servern
$query = $mysqli->query($sql);

//Kollar om den hämtade någonting om den ej gjorde det så var det fel användarnamn eller fel lösenord
//$resultat = $query->fetch_assoc();


    header('Location: ' . $_SERVER['HTTP_REFERER']);
?>