<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
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
                            echo "<br> ID:". $row["ID"]. " - Name:". $row["name"]. " Pic name:" . $row["picture_name"] . " Price:". $row["price"]. " Info:". $row["info"] ."<br>";
                         }
                      }
                      
                    }
                }else {
                  echo "Inget resultat";
                } 
              
        ?>
         
</body>
</html>