<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/TEST.css">
    <meta content="text/html; charset=iso-8859-2" http-equiv="Content-Type">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
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
                <a href="varukorg.php">
                    <img src="img/varukorg.png" class="varukorgimage">
                </a>
            </div>
            <div class="topmenu"><a href="Loggin.php">Logga in</a></div>
            <div class="topmenu2"><a href="omoss.html">Om oss</a></div>
            <div class="topmenu3"><a href="kontakt.html">Kontakta oss</a></div>
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
        <ul class="breadcrumbs">
        <li><a href="mainpage.html">Startsida</a></li>
        <li>Produktsida</li>
    </ul>
        <div class="produkter">
            <div class="tom"></div>
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
       <div class="tom2"></div>
        </div>
    </div>
</body>
</html>