<?php
//variabler jag använde
$servername = "localhost";
$username = "root";
$password = "";
$database = "webshop";

// Skapa kopling till server
$mysqli = new mysqli($servername,$username,$password,$database);

$anvnamn = $_POST["username"];
$losen = $_POST["password"];

//Skapa kommandot för att hämta användarnamn och lösenord för servern
$sql = "SELECT * FROM account WHERE userName='$anvnamn' AND password='$losen'";
//echo $sql;

//Hämtar användarnamn och lösenord för servern
$query = $mysqli->query($sql);

//Kollar om den hämtade någonting om den ej gjorde det så var det fel användarnamn eller fel lösenord
$resultat = $query->fetch_assoc();

if (!empty($resultat)) {
        $_SESSION["Login"]=TRUE;
        header('Location:userProducts.php');
    }
    else {
        $_SESSION["Login"]=FALSE;
    }
if(!$_SESSION["Login"]){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>