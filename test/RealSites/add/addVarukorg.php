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
if(!isset($_COOKIE['varukorg'])){
    echo "Setting cookie";
    $productID=array($data);
    setcookie('varukorg', serialize($productID), time() + 86400, "/");
}else{
    $array = unserialize($_COOKIE['varukorg']);
    print_r($array);
    array_push($array,$data);
    setcookie('varukorg', serialize(array_unique($array)), time() + 86400, "/");
}
header('Location:../varukorg.php')


//Skapa kommandot för att hämta användarnamn och lösenord för servern
//Aktivera komandot

?>