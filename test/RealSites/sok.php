<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="TEST.css">
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
                    <a class="loggain" href="Loggin.html"><h4>Logga in</h4></a>
                </div>
            </div>
        </div>
        <div class="kategorier">
            <h2>Kategorier</h2>

        </div>
        <div class="produkter">
        <?php
            //variabler jag använde
            $search;
            $ingetSvarCheck=0;
            $sok=$_POST["sok"];
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "webshop";

            // Skapa kopling till server
            $mysqli = new mysqli($servername,$username,$password,$database);
            
            if (!$mysqli) {
                die("Connection failed: " . mysqli_connect_error());
              }
              //SQL komando
            $sql = "SELECT ID, product_ID, product_specifikation FROM specifikation where product_specifikation='$sok'";
              //Aktivera SQL komando
            $findSpec = $mysqli->query($sql);

            // Skriver SQL komando för att söka på produktens namn
            $sql = "SELECT * FROM product where name='$sok'";
            //Aktivera SQL komando
          $findProductName = $mysqli->query($sql);

              //Ifall det finns ett resultat från sql kommndot så skrives tabbelen ut (Söker efter produkt specifikation)
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
            } else{
              $ingetSvarCheck++;
            }
            //Sök efter produkt namn
          if ($findProductName->num_rows > 0) {
              // Skriver ut data i fulla tabbeller
              while($row = $findProductName->fetch_assoc()) {
               // Skriver ut data i rader
               echo "<a href='produktinfo.php?filter=".$row['ID']."' class='lada'>
               <img src='img/".$row['picture_name']."' class='ruta'>
               <div class='namn'>".$row['name']."</div>
               <div class='pris'>".$row['price']."kr</div>
           </a>";
               }
          } else {
              if($ingetSvarCheck>0){
                  echo "Inga results";
              }
            }
        ?>
            
            
        </div>
    </div>
</body>
</html>