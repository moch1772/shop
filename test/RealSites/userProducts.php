<?php
session_start();
$_SESSION["Login"]=TRUE
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/TEST.css">
    <title>Document</title>
</head>
<body>
    <div class="content">
        <div class="meny">
            <div class="logga">
                <img src="img/logga.png" class="bild">
            </div>
            <div class="sokruta">

                <form action="sok.php" method="POST">
                    <input class="sok" type="text" name="sok" placeholder="Sök">
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
            <h2>Kategorier</h2>

        </div>
        <div class="laggtill">
            <a href="laggTillProdukt.php"><button class="laggtill2">Lägg till</button></a>
        </div>
        <div class="produkter">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "webshop";
            
            // Skapa kopling till server
            $mysqli = new mysqli($servername,$username,$password,$database);
                            ///Select * from product LIMIT 1;
                  //SQL komando
                $sql = "SELECT ID, name, price, picture_name FROM product";
                  //Aktivera SQL komando
                $result = $mysqli->query($sql);
                  //Ifall det finns ett resultat från sql kommndot såskrives tabbelen ut
                if ($result->num_rows > 0) {
                    // Skriver ut data i fulla tabbeller
                    while($row = $result->fetch_assoc()) {
                        // Skriver ut data i rader
                        echo "<a href='userProductInfo.php?filter=".$row['ID']."' class='lada'>
                        <img src='img/".$row['picture_name']."' class='ruta'>
                        <div class='namn'>".$row['name']."</div>
                        <div class='pris'>".$row['price']."kr</div>
                    </a>";
                    }
                } else {
                    echo "0 results";
                }
            ?>
            
            
        </div>
    </div>
</body>
</html>