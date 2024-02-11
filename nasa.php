<!--  -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NASA</title>
</head>
<body>
    <?php
    $apiUrl= "https://api.nasa.gov/planetary/apod";
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


    $titulo = $array['title'];
    $copy = $array['copyright'];
    $imagen = $array['url'];
    $explanation = $array['explanation'];
    $date = $array['date'];
    
    ?>
    <h1>Astronomic Picture of the Day</h1>
    <p><?php echo $date ?></p>
    <img src="<?php echo $imagen ?>"  alt="APOD">
    <p><?php echo $explanation ?></p>
    <h3><?php echo $titulo ?></h3>
    <p>Image Credit & Copyright: <?php echo $copy ?></p>

</body>
</html>