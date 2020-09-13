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
            <?php
            $counter=1;
                //variabler jag använde
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "webshop";
            if(!isset($_COOKIE['Varukorg'])){
                header('Location: varukorg.php');
            }
            // Skapa kopling till server
            $mysqli = new mysqli($servername,$username,$password,$database);
            $array = unserialize($_COOKIE['varukorg']);
            $amount = unserialize($_COOKIE['amount']);
            foreach(array_unique($array) as $ID) {
                $reduce=array_search($counter, $amount);
                $sql='select amount from product where ID='.$ID.'';
                //Aktivera SQL komando
                $result = $mysqli->query($sql);
                //Ifall det finns ett resultat från sql kommndot såskrives tabbelen ut
                    if ($result->num_rows > 0) {
                        // Skriver ut data i fulla tabbeller
                        while($row = $result->fetch_assoc()) {
                            $newAmount=$row['amount']-$reduce;
                            $sql='UPDATE product SET amount='.$newAmount.' where ID='.$ID.'';
                            $fin = $mysqli->query($sql);
                            $counter=$counter+1;
                        }}}
                        setcookie("varukorg", "", time() - 3600,'/');
                        setcookie("amount", "", time() - 3600,'/');
                            
            ?>
            <h1>Tack för ditt köp</h1>
            </div>
            <div class="tom2"></div>
        </div>

    </div>
</body>
</html>