<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Anime</title>
</head>
<body>
    <?php
    $apiUrl= "https://api.jikan.moe/v4/random/anime";

    $curl = curl_init();
    // Esto es como inciar una bbdd(en este caso la api)
    curl_setopt($curl, CURLOPT_URL, $apiUrl);
    // Le indicamos la url al curl para indicarle que url usara

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    // Guardarlo en una variable
    $respuesta = curl_exec($curl);

    // Vamos a convertir el json en un array de objetos
    $array = json_decode($respuesta, true);
    // Convertirlo en un array asociativo y no de objetos, poniendo
    // true al lado

    //var_dump($array);

    $anime = $array['data'];
    $titulo = $anime['title'];
    $imagen = $anime['images']['jpg']['large_image_url'];
    $sinopsis = $anime['synopsis'];
    $duracion = $anime['duration'];
    ?>
    <p><?php echo $titulo ?></p>
    <img src="<?php echo $imagen ?>"  alt="Anime">
    <p><?php echo $sinopsis ?></p>
    <p><?php echo $duracion ?></p>
    
</body>
</html>