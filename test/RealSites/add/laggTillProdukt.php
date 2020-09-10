<?php
session_start();

if(!$_SESSION["Login"]){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/USERproduktinfo.css">
    <title>Document</title>
</head>
<body>
    <div class="content">
        <div class="meny">
            <div class="logga">
                <img src="../img/logga.png" class="bild">
            </div>
            <div class="sokruta">

                <form action="" method="POST">
                    <input class="sok" type="text" placeholder="Sök">
                </form>
            </div>
            <div class="varukorg">
                <h2>Varukorg</h2>
            </div>
            <div class="menu">
                <div class="buttons">
                    <a class="loggain" href="Loggin.php"><h4>Logga in</h4></a>
                </div>
            </div>
        </div>
        <div class="kategorier">
            <h2 class="text">Kategorier</h2>

        </div>
        <?php
//variabler jag använde
$servername = "localhost";
$username = "root";
$password = "";
$database = "webshop";

// Skapa kopling till server
$mysqli = new mysqli($servername,$username,$password,$database);



    
    
    echo '</div>';


                echo '
                    <div class="addForm">
                    <form action="addToDATABASE.php" method="POST" enctype="multipart/form-data">
                        <div class="addingform">
                            <div class="text2">
                                <Label class="boldText">Info</Label>
                                    <textarea name="info" placeholder="Information om product" rows="10" cols="50"></textarea
                            </div>
                        </div>
                        <input class="Information" type="text" name="productName" placeholder="Produkt namn">Namn</br>
                        <input class="Information" type="number" name="amount" placeholder="Hur många eksemplar finns">Stycken kvar</br>
                        <input class="Information" type="number" name="age" placeholder="Ålder">Ålder</br>
                        <input class="Information" type="text" name="players" name="players" placeholder="Hur många spelare">Spelare<br>
                        <input class="Information" type="text" name="time" placeholder="Ungefär hur lång tid">minuter<br>
                        <input class="Information" type="number" name="price" placeholder="Pris i kronor">KR<br>
                        <input class="Information" type="file" name="pic" id="fileToUpload"><br> 
                        <div class="buttonHolder">
                            <input class="btn2" type="submit" Value="Submit">
                            </form>
                        </div>
                    </div>
                    
                    
                    
                    ';
        ?>
    </div>
</body>
</html>