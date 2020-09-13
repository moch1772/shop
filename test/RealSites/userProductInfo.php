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
    <link rel="stylesheet" href="CSS/USERproduktinfo.css">
    <title>Document</title>
</head>
<body>
    <div class="content">
        <div class="meny">
        <div class="logga">
                <a href="mainpage.html">
                <img src="img/logga.png" class="bild">
                </a>
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
                    <a class="loggain" href="userProducts.php"><h4>Tillbaka</h4></a>
                </div>
            </div>
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
                    <div class="produktinfo">
                    <div class="colume">';

                            $sql="SELECT * from specifikation where product_ID=$data";
                            $result2 = $mysqli->query($sql);
                            if ($result2->num_rows > 0) {
                                // Skriver ut data i fulla tabbeller
                                while($row2 = $result2->fetch_assoc()) {
                                    // Skriver ut Tabort kategorier
                                    echo' 
                                        <div class="specifikationLista">
                                            <div class="lista">
                                                <div class="kategoriNamn">
                                                <h3>'.$row2['product_specifikation'].'</h3></div>
                                                        <a href="tabort/taBortKategori.php?kategori='.$row2['ID'].'"><button class="Tabort">Ta bort</button></a>
                                            </div>
                                        </div>
                                        ';
                                }
                            }
                            echo'
                            <form action="add/addKategori.php?kategori='.$data.'" method="post" enctype="multipart/form-data">
                                <label for="productName">Ny kategori:</label><br>
                                <input class="ProductName" type="text" name="kategori" placeholder="Ny kategori"><br>  
                                <input class="btn2" id="kategori" type="submit" value="Submit" name="submit">
                            </form>';
                            echo'</div>
                    <form action="add/updateDATABASE.php?product='.$data.'" method="POST">
                        <div class="prodnamn">
                            <h1>'.$row['name'].'</h1>
                        </div>
                        <div class="bild2">
                            <img src="img/'.$row['picture_name'].'" class="img2">
                        </div>
                        <div class="pris">
                            <input class="price" type="number" name="price" Value="'.$row['price'].'" placeholder="Pris i kronor">KR<br>
                        </div>
                        <div class="infoHolder">
                        <div class="info">
                            <div class="text2">
                                <Label class="boldText">Info</Label>
                                    <textarea name="info" placeholder="Information om product" rows="10" cols="50">'.$row['info'].'</textarea
                            </div>
                        </div>
                        <input class="Information" type="number" name="amount" value="'.$row['amount'].'" placeholder="Hur många eksemplar finns">Stycken kvar</br>
                        <input class="Information" type="number" value="'.$row['age'].'" name="age" placeholder="Ålder">Ålder</br>
                        <input class="Information" type="text" name="Players" value="'.$row['players'].'" name="players" placeholder="Hur många spelare">Spelare<br>
                        <input class="Information" type="text" value="'.$row['time'].'" name="time" placeholder="Ungefär hur lång tid">minuter<br>
                        </div>
                        <div class="buttonHolder">
                            <input class="btn2" type="submit" Value="Submit">
                            </form>
                        </div>
                        <form action="tabort/deleteProduct.php?filter='.$data.'" method="POST">
                                <input type="submit" class="Delete" value="Radera produkt">
                        </form>
                    </div>
                    
                    
                    
                    ';
            }
        }
        ?>
    </div>
</body>
</html>