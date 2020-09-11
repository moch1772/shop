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
        <h2 class="h2">Kategorier</h2>
    <div class="menu">
        <a href="">Alla Brädspel</a>
        <a href="">Dungeons and Dragons</a>
        <a href="">Magic the Gathering</a>
        <a href="">Kortspel</a>
        <a href="">Pussel</a>
        <a href="">Familjespel</a>
        <a href="">Barnspel</a>
        <a href="">Vuxenspel</a>
        <a href="">Strategispel</a>
    </div>
    <ul class="breadcrumbs">
        <li><a href="mainpage.html">Startsida</a></li>
        <li><a href="Productpage.html">Produktsida</a></li>
        <li><a href="produktinfo.html">Carcassonne</a></li>
        <li>Varukorg</li>
    </ul>
        <div class="varukorg2">
            <div class="tom"></div>
            <form action="Kassa.php" method="POST">
            <?php
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
            
                            echo
                            '
                            <div class="lista">
                                <img src="img/'.$row['picture_name'].'" class="img">
                                    <div class="varunamn">'.$row['name'].'</div>
                                    <input style="width:8%;" type="number" name="'.$row['ID'].'" value="1">exemplar
                                    <div class="varupris">Pris: '.$row['price'].'</div>
                                    <div class="button2">
                                        <a href="tabort/tabortVarukorg.php?filter='.$row['ID'].'" class="buy2">
                                            <button type="button" class="btn2">Ta bort</button>
                                        </a>
                                    </div>
                            </div>';
            }}}
            ?>
            <div class="button">
                <div class="buy">
                    <input type="submit" value="köp" class="btn">
                </div>
            </div>
        </form>
            <div class="tom2"></div>
        </div>

    </div>
</body>
</html>