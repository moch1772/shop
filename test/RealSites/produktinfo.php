<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/produktinfo.css">
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

                <form action="" method="POST">
                    <input class="sok" type="text" placeholder="Sök">
                </form>
            </div>
            <div class="varukorg"><a href="varukorg.html"><img src="img/varukorg.png" class="varukorgimage"></a></div>
            <div class="topmenu"><a href="test/Loggin.html">Logga in</a></div>
            <div class="topmenu2"><a href="omoss.html">Om oss</a></div>
            <div class="topmenu3"><a href="kontakt.html">Kontakta oss</a></div>
        </div>
        <h2 class="h2">Kategorier</h2>
        <div class="menu">
            <a href="Productpage.html">Alla Brädspel</a>
            <a href="Productpage.html">Dungeons and Dragons</a>
            <a href="Productpage.html">Magic the Gathering</a>
            <a href="Productpage.html">Kortspel</a>
            <a href="Productpage.html">Pussel</a>
            <a href="Productpage.html">Familjespel</a>
            <a href="Productpage.html">Barnspel</a>
            <a href="Productpage.html">Vuxenspel</a>
            <a href="Productpage.html">Strategispel</a>
        </div>
        <div class="relaterade">
            <h5 class="reltext">Relaterade spel</h5>
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
            $sql="select product_specifikation from specifikation where product_ID=$data;";
            $relaterade=$mysqli-> query($sql);
            if($relaterade->num_rows > 0){
                while($row = $relaterade->fetch_assoc()) {

                    $sql="select product_ID from specifikation where product_specifikation='".$row['product_specifikation']."' AND product_ID!=$data;";
                    $relaterade2=$mysqli-> query($sql);
                    if($relaterade2->num_rows > 0 ){
                        while($rows = $relaterade2->fetch_assoc()) {

                            $sql="select * from product where ID=".$rows['product_ID'].";";
                            $relaterade3=$mysqli-> query($sql);
                            if($relaterade3->num_rows > 0){
                                while($rowd = $relaterade3->fetch_assoc()) {
                                    echo '
                                    <a href="produktinfo.php?filter='.$rowd['ID'].'">
                                    <div class="objekt">
                                    <img src="img/'.$rowd['picture_name'].'" class="img">
                                    <div class="relateradHolder">
                                        <div class="spelnamn">'.$rowd['name'].'</div>
                                    </div>
                                    </div>
                                    </a>';
                                }
                            }
                        }
                    }
                }
            }else{
                echo '<div class="">Detta spel är unikt</div>';
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
                        echo '<div class="produktinfo">
                        <div class="prodnamn">
                            <h1>'.$row['name'].'</h1>
                        </div>
                        <div class="bild2">
                            <img src="img/'.$row['picture_name'].'" class="img2">
                        </div>
                        <div class="pris">
                            <h2>'.$row['price'].'kr</h2>
                        </div>
                        <div class="info">
                            <div class="text2">
                                <h3>'.$row['info'].'</h3>
                            </div>
                        </div>
                        <div class="data">
                            <div>Stycken kvar '.$row['amount'].'</div>
                            <div>Antal spelare '.$row['players'].'</div>
                            <div class="rightDATA">
                                <div>Ålder '.$row['age'].'+</div>
                                <div>Ungefär tid '.$row['time'].'</div>
                                <form action="add/addVarukorg.php?filter='.$data.'" method="POST">
                                    <input type="submit" class="addToVarukorg" value="Lägg till i varukorgen">
                                </form>
                            </div>
                        </div>
                    </div>';
                    }
                }
        
        ?>
    </div>
</body>
</html>