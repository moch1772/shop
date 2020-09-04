<?php
//variabler jag använde
$servername = "localhost";
$username = "root";
$password = "";
$database = "webshop";

$img;
// Skapa kopling till server
$mysqli = new mysqli($servername,$username,$password,$database);

$sql="select picture_name from product"; 
$data;
    if(isset($_GET["filter"]))
    {
        $data = $_GET["filter"];
    }
    if($data==null){
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    $sql="select picture_name from product where ID=$data";
    $result = $mysqli->query($sql);
    //Ifall det finns ett resultat från sql kommndot såskrives tabbelen ut
  if ($result->num_rows > 0) {
      // Skriver ut data i fulla tabbeller
      while($row = $result->fetch_assoc()) {
          $img=$row['picture_name'];
      }
    }


//Skapa kommandot för att hämta användarnamn och lösenord för servern
unlink('../img/'.$img.'');
$sql = "DELETE FROM product WHERE ID=$data";
var_dump($sql);
//Aktivera komandot
$query = $mysqli->query($sql);

$sql = "DELETE FROM specifikation WHERE product_ID=$data";
var_dump($sql);
$query = $mysqli->query($sql);

    header('Location: ../userProducts.php');
?>