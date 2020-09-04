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
    <link rel="stylesheet" href="USERproduktinfo.css">
    <title>Document</title>
</head>
<body>
    <div class="content">
        <div class="meny">
            <div class="logga">
                <img src="img/logga.png" class="bild">
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

$data;
    if(isset($_GET["filter"]))
    {
        $data = $_GET["filter"];
    }
    if($data==null){
        header('Location:Productpage.php');
    }

    
    
    echo '</div>';


$sql = "SELECT * FROM product where ID=$data";
          //Aktivera SQL komando
        $result = $mysqli->query($sql);
          //Ifall det finns ett resultat från sql kommndot såskrives tabbelen ut
        if ($result->num_rows > 0) {
            // Skriver ut data i fulla tabbeller
            while($row = $result->fetch_assoc()) {
                // Skriver ut data i rader
                echo '
                <form action="updateDATABASE" method="POST">
                    <div class="produktinfo">
                        <div class="prodnamn">
                            <h1>'.$row['name'].'</h1>
                        </div>
                        <div class="bild2">
                            <img src="img/'.$row['picture_name'].'" class="img2">
                        </div>
                        <div class="pris">
                            <input class="price" type="text" name="price" Value="'.$row['price'].'" placeholder="Pris i kronor">KR<br>
                        </div>
                        <div class="info">
                            <div class="text2">
                                <Label class="boldText">Info</Label>
                                    <textarea name="info" placeholder="Information om product" rows="10" cols="30">'.$row['info'].'</textarea
                            </div>
                        </div>
                        <input class="Information" type="text" name="amount" value="'.$row['amount'].'" placeholder="Hur många eksemplar finns">Stycken kvar</br>
                        <input class="Information" type="text" value="'.$row['age'].'" name="age" placeholder="Ålder">Ålder</br>
                        <input class="Information" type="text" value="'.$row['players'].'" name="players" placeholder="Hur många spelare">Spelare<br>
                        <input class="Information" type="text" value="'.$row['time'].'" name="time" placeholder="Ungefär hur lång tid">minuter<br>
                        <div class="buttonHolder">
                            <input class="btn2" type="submit" Value="Submit">
                            </form>
                        </div>
                    </div>';
            }
        }
        ?>
    </div>
</body>
</html>