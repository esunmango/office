<?php
$servername = "localhost";
$username = "root";
$password = "";

try {
    $conn = new PDO("mysql:host=$servername;dbname=quotes", $username, $password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $id = rand(1, 6);

    $query = "SELECT * FROM `quotes` where id = $id ";
    $gsent = $conn->prepare($query);
    $gsent->execute();
    $resultado = $gsent->fetchAll(PDO::FETCH_ASSOC);
    $resultado = $resultado[0];
    //print_r($resultado);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?> 

<html>
    <head>
        <meta charset="utf-8">

        <style>
            html {
                height:100%;
                width:100%;
                 padding:0;
                margin:0;
            }
            body{
                padding:0;
                margin:0;
            }
            img{
               // background:#8ba987 url('img/<?php echo $id?>.jpg') no-repeat center center;
               // background-size:100% 100%;
                width: 100%;
                filter:blur(3px);
            }
            .contenedor {
                position: absolute;
                top: 60%;
                left: 50%;
                width: 320px;
                height:320px; 
                margin-left: -160px; 
                margin-top: -160px;
                color:white;
                font-family: sans-serif;
                }
        </style>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </head>
    <body>

        <img src="img/<?php echo $id?>.jpg" />
        
        <div class="contenedor">
            <h1>"<?php echo $resultado["quote"]?>"</h1>
            <h4>-<?php echo $resultado["by"]?></h4>
        </div>

    </body>
</html>