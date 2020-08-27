<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="SvenskaFotbollsforbundet.css">
    <title>Document</title>
</head>
<body>

    <?php
    //konektar till databas
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "webshop";
    $sql = new mysqli($servername,$username,$password,$database);
    function getSpecific($result,$whatTowrite){
        //Hämta specifik data från databas
        if ($row = $result->fetch_assoc()) {
        return $row[$whatTowrite];
        }}


    $userName=$_POST["username"];
    $pass=$_POST["password"];

        //duplicate check
    $check="select COUNT(*) AS number from account where userName='".$userName."';";

        $result = $sql->query($check);
    $numberCheck=getSpecific($result,'number');

    if($numberCheck<1){
    $saveToLogin='INSERT INTO account(userName,password) VALUES("'.$userName.'","'.$pass.'");';
    $saveToClub='INSERT INTO club(name) VALUES("'.$userName.'");';
    $result = $sql->query($saveToLogin);
    $result = $sql->query($saveToClub);
    print("De lyckades");
}
        else{
            print("Namn är taget");
            header('refresh:3; url=signUptest.html');
        }
    ?>
</body>
</html>