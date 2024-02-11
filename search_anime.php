<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Random Anime</title>
</head>
<body>
    <form action="" method="post">
        Titulo: <input type="text" name="titulo"><br><br>
        Cantidad: <select name="limite">
            <option selected value="">Todos</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            
            <!-- ?php for(i =1...){?>
                option value="?php echo $i ?>"<php echo $i ?></option>
            <php } ?> -->

        </select>
        Min Score: <select name="min">
            <option selected value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
        </select>
        Max Score: <select name="max">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10" selected>10</option>
        </select>
        <input type="submit" value="Buscar">
    </form>

    <?php
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $titulo = $_POST["titulo"];
        $limite = $_POST["limite"];
        $minimo = $_POST["min"];
        $maximo = $_POST["max"];

        // Se puede descomponer lo que necesitamos poner en el apiurl
        // $q = "q=$titulo";
        // $limite = "limite=$limite";
        // $min_score = "min_score=$notaMin";
        // $max_score = "max_score=$notaMax";

        // Y para ponerla en la url -> "../anime?$q&$limit&$minScore&$maxScore";

        // Quitamos los espacios en blanco por "+"
        $titulo= preg_replace('/\s+/','+',$titulo);
        $apiUrl= "https://api.jikan.moe/v4/anime?sfw&q=$titulo&limit=$limite&min_score=$minimo&max_score=$maximo";

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

        $animes = $array['data'];

        // Recorremos los animes buscados
        foreach($animes as $anime){ ?>
        <h1> <?php echo $anime['title'] ?></h1>

        <!-- Para enviar el id de cada anime a la otra pagina
        debemos pasarle el id, viendo que lo identifica (mal_id) -->
        <p><a href="show_anime.php?id=<?php echo $anime['mal_id'] ?>">Ver detalles</a></p>
        
        <?php $imagen = $anime['images']['jpg']['large_image_url']; ?>
        <img src="<?php echo $imagen ?>" alt="">
        <h1>Score: <?php echo $anime['score'] ?></h1>

        <?php }
    }
    ?>
</body>
</html>