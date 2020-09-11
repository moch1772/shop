<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/varukorg.css">
    <meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Varukorg</title>
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
        </div>
        <div class="Kategori">
            <h2 class="h2">Kategorier</h2>
        <div class="menu">
            <a href="Productpage.php">Alla Brädspel</a>
            <a href="Kategori.php?filter=Dnd">Dungeons and Dragons</a>
            <a href="Kategori.php?filter=Mtg">Magic the Gathering</a>
            <a href="Kategori.php?filter=Kortspel">Kortspel</a>
            <a href="Kategori.php?filter=Pussel">Pussel</a>
            <a href="Kategori.php?filter=Familj">Familjespel</a>
            <a href="Kategori.php?filter=Barn">Barnspel</a>
            <a href="Kategori.php?filter=Vuxna">Vuxenspel</a>
            <a href="Kategori.php?filter=Strategi">Strategispel</a>
        </div>
        </div>
        <div class="varukorg2">
            <ul class="breadcrumbs">
                <li><a href="mainpage.html">Startsida</a></li>
                <li><a href="Productpage.html">Produktsida</a></li>
                <li><a href="produktinfo.html">Carcassonne</a></li>
                <li>Varukorg</li>
            </ul>
            <div class="tom"></div>
            <form action="betala.php" method="POST">
            <?php
            $summa=0;
                //variabler jag använde
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "webshop";

            // Skapa kopling till server
            $mysqli = new mysqli($servername,$username,$password,$database);
            $array = unserialize($_COOKIE['varukorg']);
            foreach(array_unique($array) as $ID) {
                $sql='select * from product where ID='.$ID.'';
                //Aktivera SQL komando
                $result = $mysqli->query($sql);
                //Ifall det finns ett resultat från sql kommndot såskrives tabbelen ut
                    if ($result->num_rows > 0) {
                        // Skriver ut data i fulla tabbeller
                        while($row = $result->fetch_assoc()) {
                            if(!isset($_POST[$row['ID']])){
                                header('Location:varukorg.php');
                            }
                            $multiply=$_POST[$row['ID']];
                            echo
                            '
                            <div class="lista">
                                <img src="img/'.$row['picture_name'].'" class="img">
                                    <div class="varunamn">'.$row['name'].'*'.$multiply.'</div>
                                    <div class="varupris">Pris: '.$row['price']*$multiply.'</div>
                            </div>';
                            $multiply=$_POST[$row['ID']];
                            $summa=$summa+$row['price']*$multiply;
            }}}
            echo '<div class="Summa">'.$summa.'</div>';
            ?>
            <div class="KundInfo">
            <input type="text" placeholder="Hem addres" name="addres" required>
            <input type="number" placeholder="Postnummer:12345" pattern="[0-9]{5}" name="postNumber" required>
            <input type="tel" name="phone" placeholder="tel:1234567890" pattern="[0-9]{10}" required>
            <input type="text" placeholder="För och efternamn" name="Name" required>
            </div>
            <div class="button">
                <div class="buy">
                    <input type="submit" value="Betala" class="btn">
                </div>
            </div>
        </form>
            <div class="tom2"></div>
        </div>

    </div>
</body>
</html>