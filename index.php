<!doctype html>

<?php
session_start();
?>

<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RALU +</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="cl.css">
  </head>
  <body>

    <?php require 'commun/header.php'?>

    <div style="height: 100px;">
        <div class="mh-100" style="width: 100px; height: 200px;"></div>
    </div>

    <div class="container-lg" id="slide">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="assets/slides/1.png" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="assets/slides/2.png" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="assets/slides/3.png" class="d-block w-100">
                </div>
                <div class="carousel-item">
                    <img src="assets/slides/4.png" class="d-block w-100">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>

    <section id="sec">
        <div class="container px-4 text-center align-items-center" id="cont">
            <div class="row gx-5 align-items-center justify-content-between">
                <div class="col-2 p-2 align-self-center bloc-container">
                    <div class="p-3 div2 d-flex justify-content-center" onclick="redirectToPage('disney.php')">
                        <img src="assets/cat/disney.png" width="130" height="auto">
                    </div>
                </div>
                <div class="col-2 p-2 bloc-container">
                    <div class="p-3 div2 2d-flex justify-content-center">
                        <img src="assets/cat/pixar.png" width="130" height="auto">
                    </div>
                </div>
                <div class="col-2 p-2 bloc-container">
                    <div class="p-3 div2 d-flex justify-content-center" onclick="redirectToPage('marvel.php')">
                        <img src="assets/cat/marvel.png" width="130" height="auto">
                    </div>
                </div>
                <div class="col-2 p-2 bloc-container">
                    <div class="p-3 div2 d-flex justify-content-center" onclick="redirectToPage('starwars.php')">
                        <img src="assets/cat/starwars.png" width="130" height="auto">
                    </div>
                </div>
                <div class="col-2 p-2 bloc-container">
                    <div class="p-3 div2 d-flex justify-content-center">
                        <img src="assets/cat/natgeo.png" width="140" height="auto">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
    // Fonction pour rediriger vers une autre page
    function redirectToPage(pageUrl) {
        window.location.href = pageUrl;
    }
    </script>

    <h4 class="mt-4">Nouveau sur Ralu +</h4>
    <Section id="list">
        <div class="row mb-3 text-leading" id="listCard">
            <?php

            function fetchWikidataResults($sparqlQuery) {
                $url = 'https://query.wikidata.org/sparql?query=' . urlencode($sparqlQuery) . '&format=json';

                $ch = curl_init($url);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
                curl_setopt($ch, CURLOPT_USERAGENT, 'YourApp/1.0');

                $result = curl_exec($ch);

                if (curl_errno($ch)) {
                    echo 'Erreur cURL : ' . curl_error($ch);
                }

                curl_close($ch);
                $data = json_decode($result, true);

                return $data;
            }

            $sparqlQuery = '
            SELECT ?itemLabel ?pic ?date
            WHERE {
                ?item wdt:P1476 ?itemLabel. # Title
                ?item wdt:P580 ?date.
                #?item wdt:P31 wd:Q11424.  # Film
                ?item wdt:P31 wd:Q5398426.  # Television series
                ?item wdt:P750 wd:Q54958752.  # Platform = Disney+
                OPTIONAL{
                    ?item wdt:P154 ?pic.
                }
            }
            ORDER BY DESC(BOUND(?pic)) DESC(?date)
            LIMIT 5
            ';

            $searchResults = fetchWikidataResults($sparqlQuery);

            foreach ($searchResults['results']['bindings'] as $result) {
                $title = $result['itemLabel']['value'];
                $pic = isset($result['pic']['value']) ? $result['pic']['value'] : 'N/A';

                $imageSrc = ($pic != 'N/A' && !empty($pic)) ? $pic : 'assets/ralu+w.png';

                echo '<div class="card text-bg-dark" style="width:250px;" onclick="redirectToPage(\'details.php\')">';
                echo '<img src="' . $imageSrc . '" class="card-img-top bg-white" alt="...">';
                echo '<div class="card-body">';
                echo '<h6 class="card-title">' . $title . '</h6>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </Section>

    <h4 class="mt-4">Drama</h4>
    <section id="list">
        <div class="row" id="listCard">
        <?php

            $sparqlQuery = '
            SELECT ?itemLabel ?pic
            WHERE {
                ?item wdt:P1476 ?itemLabel. # Title
                ?item wdt:P136 wd:Q1366112. # GenreDrama
                #?item wdt:P31 wd:Q11424.  # Film
                ?item wdt:P31 wd:Q5398426.  # Television series
                ?item wdt:P750 wd:Q54958752.  # Platform = Disney+
                OPTIONAL{
                    ?item wdt:P154 ?pic.
                }
            }
            ORDER BY DESC (?pic)
            LIMIT 5
            ';

            $searchResults = fetchWikidataResults($sparqlQuery);

            foreach ($searchResults['results']['bindings'] as $result) {
                $title = $result['itemLabel']['value'];
                $pic = isset($result['pic']['value']) ? $result['pic']['value'] : 'N/A';

                $imageSrc = ($pic != 'N/A' && !empty($pic)) ? $pic : 'assets/ralu+w.png';

                echo '<div class="card text-bg-dark" style="width:250px;" onclick="redirectToPage(\'details.php\')">';
                echo '<img src="' . $imageSrc . '" class="card-img-top bg-white" alt="...">';
                echo '<div class="card-body">';
                echo '<h6 class="card-title">' . $title . '</h6>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </section>

    <h4 class="mt-4">Crime</h4>
    <section id="list">
        <div class="row" id="listCard">
        <?php

            $sparqlQuery = '
            SELECT ?itemLabel ?pic
            WHERE {
                ?item wdt:P1476 ?itemLabel. # Title
                ?item wdt:P136 wd:Q9335577. # GenreDrama
                #?item wdt:P31 wd:Q11424.  # Film
                ?item wdt:P31 wd:Q5398426.  # Television series
                ?item wdt:P750 wd:Q54958752.  # Platform = Disney+
                OPTIONAL{
                    ?item wdt:P154 ?pic.
                }
            }
            ORDER BY DESC (?pic)
            LIMIT 5
            ';

            $searchResults = fetchWikidataResults($sparqlQuery);

            foreach ($searchResults['results']['bindings'] as $result) {
                $title = $result['itemLabel']['value'];
                $pic = isset($result['pic']['value']) ? $result['pic']['value'] : 'N/A';

                $imageSrc = ($pic != 'N/A' && !empty($pic)) ? $pic : 'assets/ralu+w.png';

                echo '<div class="card text-bg-dark" style="width:250px;" onclick="redirectToPage(\'details.php\')">';
                echo '<img src="' . $imageSrc . '" class="card-img-top bg-white" alt="...">';
                echo '<div class="card-body">';
                echo '<h6 class="card-title">' . $title . '</h6>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </section>

    <h4 class="mt-4">Romance</h4>
    <section id="list">
        <div class="row" id="listCard">
        <?php

            $sparqlQuery = '
            SELECT ?itemLabel ?pic
            WHERE {
                ?item wdt:P1476 ?itemLabel. # Title
                ?item wdt:P136 wd:Q1054574. # GenreDrama
                ?item wdt:P31 wd:Q11424.  # Film
                #?item wdt:P31 wd:Q5398426.  # Television series
                ?item wdt:P750 wd:Q54958752.  # Platform = Disney+
                OPTIONAL{
                    ?item wdt:P154 ?pic.
                }
            }
            ORDER BY DESC (?pic)
            LIMIT 5
            ';

            $searchResults = fetchWikidataResults($sparqlQuery);

            foreach ($searchResults['results']['bindings'] as $result) {
                $title = $result['itemLabel']['value'];
                $pic = isset($result['pic']['value']) ? $result['pic']['value'] : 'N/A';

                $imageSrc = ($pic != 'N/A' && !empty($pic)) ? $pic : 'assets/ralu+w.png';

                echo '<div class="card text-bg-dark" style="width:250px;" onclick="redirectToPage(\'details.php\')">';
                echo '<img src="' . $imageSrc . '" class="card-img-top bg-white" alt="...">';
                echo '<div class="card-body">';
                echo '<h6 class="card-title">' . $title . '</h6>';
                echo '</div>';
                echo '</div>';
            }
            ?>
        </div>
    </section>

    <?php require 'commun/footer.html'?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
