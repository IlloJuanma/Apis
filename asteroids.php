<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asteroides</title>
</head>
<body>
    <h1>Ver asteroides que nos van a matar</h1>
    <h2>Dale</h2>
    <form action="" method="post">
        <label>Fecha de inicio</label>
        <input type="date" name="inicio">
        <br><br>
        <label>Fecha de fin</label>
        <input type="date" name="fin">
        <br><br>
        <input type="submit" value="Enviar">
    </form>
    <?php

    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $inicio = $_POST["inicio"];
        $fin = $_POST["fin"];
        
        
        $apiUrl= "https://api.nasa.gov/neo/rest/v1/feed?start_date=$inicio&end_date=$fin&api_key=API_KEY";
        $apiKey = "VBRlo3AgL3XFTspVPxFMuIb2f2kgpHqjT1wrImUL";
    
        $curl = curl_init();
        // Esto es como inciar una bbdd(en este caso la api)
        curl_setopt($curl, CURLOPT_URL, $apiUrl);
        // Le indicamos la url al curl para indicarle que url usara
    
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($curl, CURLOPT_USERPWD, $apiKey . ":");
    
        $respuesta = curl_exec($curl);
        $array = json_decode($respuesta, true);



    }




    ?>
</body>
</html>