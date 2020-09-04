<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "webshop";

// Skapa kopling till server
$mysqli = new mysqli($servername,$username,$password,$database);


$target_dir = "img/";
$imgName=basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// kollar ifall datan är lika med en image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Kollar om filen redan finns
if ($uploadOk==1 && file_exists($target_file)) {
  echo "Sorry, file already exists.";
  $uploadOk = 0;
}

// Filstorlek 
if ($uploadOk==1 && $_FILES["fileToUpload"]["size"] > 500000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Säger vilka filer som får laddas up
if($uploadOk==1 && $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg") {
  echo "Sorry, only JPG, JPEG & PNG files are allowed.";
  $uploadOk = 0;
}

// Kollar om $uploadOk är 0 eller inte
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
  header('Location: ' . $_SERVER['HTTP_REFERER']);
// Laddar upp filen
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
    
    $sql = "INSERT INTO product (name, price, amount, picture_name, info, players, age, time)
        VALUES ('".$_POST["productName"]."', ".$_POST["price"].", ".$_POST["amount"].", '".$imgName."', '".$_POST["info"]."', '".$_POST["players"]."', ".$_POST["age"].", '".$_POST["time"]."');";
        $result=$mysqli->query($sql);
        header('Location:Productpage.php');




  } else {
    echo "Sorry, there was an error uploading your file.";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
  }
}
?>