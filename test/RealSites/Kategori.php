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
        <div class="produkter">
        <?php
            //variabler jag använde
            $search;
            $filter;
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "webshop";

            // Skapa kopling till server
            $mysqli = new mysqli($servername,$username,$password,$database);
            
            if (!$mysqli) {
                die("Connection failed: " . mysqli_connect_error());
              }

                //Hämtar information från URL länken
              if(isset($_GET["filter"]))
              {
                  $filter = $_GET["filter"];
              }

                 //SQL komando
                $sql = "SELECT ID, product_ID, product_specifikation FROM specifikation where product_specifikation='$filter'";
                    //Aktivera SQL komando
                $findSpec = $mysqli->query($sql);
                //Ifall det finns ett resultat från sql kommndot såskrives tabbelen ut
                if ($findSpec->num_rows > 0) {
                  // Hittar alla produkter med denna product_specifikation
                  while($row = $findSpec->fetch_assoc()) {
                      $search=$row["product_ID"];
                          // Skriver SQL komando med product_ID från förra komandod i from av $search
                      $sql = "SELECT * FROM product where ID=$search";
                        //Aktivera SQL komando
                      $findProduct = $mysqli->query($sql);
                        //Ifall det finns ett resultat från sql kommndot så skrives tabbelen ut
                      if ($findProduct->num_rows > 0) {
                          // Skriver ut data i fulla tabbeller
                        while($row = $findProduct->fetch_assoc()) {
                         // Skriver ut data i rader
                            echo "<a href='produktinfo.php?filter=".$row['ID']."' class='lada'>
                            <img src='img/".$row['picture_name']."' class='ruta'>
                            <div class='namn'>".$row['name']."</div>
                            <div class='pris'>".$row['price']."kr</div>
                        </a>";
                         }
                      }
                      
                    }
                }else {
                  echo "Inget resultat";
                } 
              
        ?>  
        </div>
    </div>
</body>
</html>