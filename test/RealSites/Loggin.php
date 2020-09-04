<?php
session_start();
$_SESSION["Login"]=FALSE;
?>

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
        <div class="kategorier">
            <h2>Kategorier</h2>

        </div>
        <div class="produkter">
            
            <form action="signIN.php" method="POST">
                <input class="input" type="text" name="username" placeholder="Användarnamn">
                </br>
                <input class="input" class="input" type="password" name="password" placeholder="Lösenord">       
                </br>
                <input type="submit" class="input button" value="        Nästa       " name="skickaknapp">
            </form>
            
        </div>
    </div>
</body>
</html>