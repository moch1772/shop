<?php
//variabler jag använde
$servername = "localhost";
$username = "root";
$password = "";
$database = "webshop";

// Skapa kopling till server
$mysqli = new mysqli($servername,$username,$password,$database);


$data;
    if(isset($_GET["filter"]))
    {
        $data = $_GET["filter"];
    }
    if($data==null){
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
$array = unserialize($_COOKIE['varukorg']);
print_r($array);
if (($key = array_search($data, $array)) !== false) {
    var_dump($key);
    unset($array[$key]);
}
setcookie('varukorg', serialize($array), time() + 86400, "/");

header('Location:../varukorg.php')


//Skapa kommandot för att hämta användarnamn och lösenord för servern
//Aktivera komandot

?>