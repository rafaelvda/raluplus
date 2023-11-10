<?php
  session_start();
  
  if(!isset($_SESSION["username"])){
    header("Location: connexion.php");
    exit(); 
  }
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="cl.css">
    <title>Rechercher</title>
</head>
<body>
    <?php require 'commun/header.php'?>

    <div style="height: 100px;">
        <div class="mh-100" style="width: 100px; height: 200px;"></div>
    </div>

    <h1>Rechercher</h1>

    <div class="container mt-3">
        <form class="d-flex" method="post" action="">
            <input name="search_query" class="form-control me-2" type="search" placeholder="Titre, film ou série" aria-label="Rechercher">
            <button class="btn btn-outline-light" type="submit">Rechercher</button>
        </form>
    </div>

    <div style="height: 50px;">
        <div class="mh-100" style="width: 100px; height: 50px;"></div>
    </div>

    <Section id="list">
        <div class="row mb-3 text-leading">
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
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $searchQuery = isset($_POST['search_query']) ? $_POST['search_query'] : '';

                $sparqlQuery = "
                SELECT ?itemLabel ?pic
                WHERE {
                {
                    ?seriesItem wdt:P1476 ?itemLabel. # Title
                    ?seriesItem wdt:P31 wd:Q5398426.  # Television series
                    ?seriesItem wdt:P750 wd:Q54958752.  # Platform = Disney+

                    FILTER(CONTAINS(UCASE(?itemLabel), UCASE('$searchQuery')))
                    OPTIONAL {
                    ?seriesItem wdt:P154 ?pic.
                    }
                }
                UNION
                {
                    ?filmItem wdt:P1476 ?itemLabel. # Title
                    ?filmItem wdt:P31 wd:Q11424.  # Film
                    ?filmItem wdt:P750 wd:Q54958752.  # Platform = Disney+

                    FILTER(CONTAINS(UCASE(?itemLabel), UCASE('$searchQuery')))
                    OPTIONAL {
                    ?filmItem wdt:P154 ?pic.
                    }
                }
                }
                ORDER BY DESC (?pic)
                ";

                $searchResults = fetchWikidataResults($sparqlQuery);

                foreach ($searchResults['results']['bindings'] as $result) {
                    $title = $result['itemLabel']['value'];
                    $pic = isset($result['pic']['value']) ? $result['pic']['value'] : 'N/A';

                    $imageSrc = ($pic != 'N/A' && !empty($pic)) ? $pic : 'assets/ralu+w.png';

                    $titleToSearch = $title; 

                    echo '<div class="col-md-3 themed-grid-col">';
                    echo '<div class="card text-bg-dark" style="width:250px;">';
                    echo '<img src="' . $imageSrc . '" class="card-img-top bg-white" alt="...">';
                    echo '<div class="card-body">';
                    echo '<a style="text-decoration:none; color:white" href="details.php?title=' . urlencode($titleToSearch) . '">' . $title . '</a>';
                    echo '</div>';
                    echo '</div>';
                    echo '</div>';
                }
            }
            ?>
        </div>
    </Section>

    <?php require 'commun/footer.html'?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>
