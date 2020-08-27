<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="TEST.css">
</head>
<body>
        <a href="./postTEST.php?data=BACON&data2=Data120">back</a>
        <?php
        $data;
        $data2;
            if(isset($_GET["data"]) && isset($_GET["data2"]))
            {
                $data = $_GET["data"];
                $data2 = $_GET["data2"];
            }
            echo  "</br>";
            echo $data;
            echo  "</br>";
            echo $data2;
        ?>
</body>
</html>