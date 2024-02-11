<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perros</title>
</head>
<body>
    <?php
    $apiUrl= "https://dog.ceo/api/breeds/image/random";

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $apiUrl);

    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $respuesta = curl_exec($curl);
    $array = json_decode($respuesta, true);

    print_r($array);

    $perro = $array['message']
?>
<h2>Que perro mas bonicto</h2>
<img src="<?php echo $perro ?>" alt="Perro">
<button id="act">Actualizar</button>
    
<script>
    
let boton = document.getElementById('act');

boton.addEventListener('click', function(){
    console.log("ola");
    location.reload();
})

</script>
</body>
</html>