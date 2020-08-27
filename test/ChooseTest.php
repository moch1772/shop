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
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "webshop";

            // Skapa kopling till server
            $mysqli = new mysqli($servername,$username,$password,$database);
            
            if (!$mysqli) {
                die("Connection failed: " . mysqli_connect_error());
              }
              echo "Connected successfully";
              //SQL komando
            $sql = "SELECT ID, product_ID, product_specifikation FROM specifikation where product_specifikation='Bild'";
              //Aktivera SQL komando
            $result = $mysqli->query($sql);
              //Ifall det finns ett resultat från sql kommndot såskrives tabbelen ut
            if ($result->num_rows > 0) {
                // Skriver ut data i fulla tabbeller
                while($row = $result->fetch_assoc()) {
                    $search=$row["product_ID"];
                        // Skriver SQL komando med data från det förra kommandod 
                    $sql = "SELECT ID, name, picture_name FROM product where ID=$search";
                      //Aktivera SQL komando
                    $result = $mysqli->query($sql);
                        //Ifall det finns ett resultat från sql kommndot såskrives tabbelen ut
                    if ($result->num_rows > 0) {
                        // Skriver ut data i fulla tabbeller
                        while($row = $result->fetch_assoc()) {
                         // Skriver ut data i rader
                            echo "<br> ID: ". $row["ID"]. " - Name: ". $row["name"]. " " . $row["picture_name"] . "<br>";
                         }
                    } else {
                        echo "0 results";
                    }
                }
            } 
        ?>
         
</body>
</html>