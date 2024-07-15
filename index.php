<?php
    const API_URL = "https://whenisthenextmcufilm.com/api" ;
    /* inicializamos curl */
    $ch = curl_init(API_URL);
    // recibimos el resultado y evitamos mostrarlo
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //ejecutamos y guardamos el resultado
    $result = curl_exec($ch);
    //tranformamos a json
    $data = json_decode($result, true);
    /* cerramos conexion */
    curl_close($ch);
?>

<!-- html aqui -->
 <head>
    <title>La Proxima pelicula de marvel</title>
    <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css"
    />
 </head>

 <main>
    <section>
        <h1>Proxima pelicula de marvel  </h1>
        <?php if (is_array($data) && isset($data["poster_url"])): ?>
            <img src="<?= $data["poster_url"]; ?>" width="300"
                style="border-radius: 16px; margin: 0 auto;"
            />
        <?php endif; ?>

        <hgroup>
            <h3> <?= $data["title"] ?> se estrena en <?= $data["days_until"]; ?></h3>
            <p>La siguente es: <?= $data["following_production"]["title"]; ?> </p>
        </hgroup>
    </section>
 </main>

<!-- css aqui -->
<style>
:root {
    color-scheme: light dark;
}
body{
    display: grid;
    place-content: center;
}
img{
    margin: 0 auto;
}
section{
    text-align: center;
}
hgroup{
    display: flex;
    flex-direction: column;
    justify-content: center;
    text-align: center;
}
</style>