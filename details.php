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
    <title>Details</title>
</head>
<body>
    <?php require 'commun/header.php'?>
    
    <div style="height: 100px;">
        <div class="mh-100" style="width: 100px; height: 200px;"></div>
    </div>

    <?php

        function fetchWikidataResults($sparqlQuery) {
            $url = 'https://query.wikidata.org/sparql?query=' . urlencode($sparqlQuery) . '&format=json';

            // Utilisez cURL pour récupérer les données JSON
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

        $titleToSearch = isset($_GET['title']) ? urldecode($_GET['title']) : '';

        //var_dump($titleToSearch);

        ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


        $sparqlQuery = "
            SELECT ?itemLabel ?pic ?note ?award ?cost ?date ?dir ?duration ?episodes ?seasons
            WHERE {
            {
                ?seriesItem wdt:P1476 ?itemLabel. # Title
                ?seriesItem wdt:P2047 ?duration.
                ?seriesItem wdt:P57 ?dir.
                ?seriesItem wdt:P31 wd:Q5398426.  # Television series
                ?seriesItem wdt:P750 wd:Q54958752.  # Platform = Disney+

                FILTER(CONTAINS(UCASE(?itemLabel), UCASE('$titleToSearch')))
                OPTIONAL{
                  ?seriesItem wdt:P1113 ?episodes.  # Episodes
                  }.
                OPTIONAL{
                  ?seriesItem wdt:P2437 ?seasons.  # Seasons
                  }.
                OPTIONAL{
                      ?seriesItem wdt:P154 ?pic}.
                      OPTIONAL{
                      ?seriesItem wdt:P1258 ?note}.
                        OPTIONAL{
                      ?seriesItem wdt:P166 ?award}.
                          OPTIONAL{
                      ?seriesItem wdt:P2130 ?cost}.
                            OPTIONAL{
                      ?seriesItem wdt:P580 ?date}.
            }
            UNION
            {
                ?filmItem wdt:P1476 ?itemLabel. # Title
                ?filmItem wdt:P2047 ?duration.
                ?filmItem wdt:P57 ?dir.
                ?filmItem wdt:P31 wd:Q11424.  # Film
                ?filmItem wdt:P750 wd:Q54958752.  # Platform = Disney+

                FILTER(CONTAINS(UCASE(?itemLabel), UCASE('$titleToSearch')))
                OPTIONAL{
                      ?filmItem wdt:P154 ?pic}.
                      OPTIONAL{
                      ?filmItem wdt:P1258 ?note}.
                        OPTIONAL{
                      ?filmItem wdt:P166 ?award}.
                          OPTIONAL{
                      ?filmItem wdt:P2130 ?cost}.
                            OPTIONAL{
                      ?filmItem wdt:P580 ?date}.
            }
            }
            ORDER BY DESC (?pic)
            ";

            $searchResults = fetchWikidataResults($sparqlQuery);

            //var_dump($searchResults);

            // Afficher les résultats dans des cartes HTML
            foreach ($searchResults['results']['bindings'] as $result) {
                $title = $result['itemLabel']['value'];
                $dir = $result['dir']['value'];
                $duration = $result['duration']['value'];

                $pic = isset($result['pic']['value']) ? $result['pic']['value'] : 'N/A';
                $note = isset($result['note']['value']) ? $result['note']['value'] : '...';
                $award = isset($result['award']['value']) ? $result['award']['value'] : '...';
                $cost = isset($result['cost']['value']) ? $result['cost']['value'] : '...';
                $date = isset($result['date']['value']) ? $result['date']['value'] : '...';

                $episodes = isset($result['episodes']['value']) ? $result['episodes']['value'] : '...';
                $seasons = isset($result['seasons']['value']) ? $result['seasons']['value'] : '...';

                $imageSrc = ($pic != 'N/A' && !empty($pic)) ? $pic : 'assets/ralu+w.png';

                echo '<section id="info">';
                echo '<img src="' . $imageSrc . '" class="rounded bg-white">';
                echo '<p class="fs-5 fw-bold text-warning">Disponible dès maintenant en IMAX Enhanced</p>';
                echo '<p id="txt" class="fs-6">' . $date . ' - ' . $duration . ' min</p>';
                echo '<p id="txt" class="fs-6">Genre</p>';
                echo '<button type="button" class="btn btn-light fw-bold">LECTURE</button>';
                echo '<span class="mx-1"></span>';
                echo '<button type="button" class="btn btn-outline-light fw-bold">BANDE-ANNONCE</button>';
                echo '<span class="mx-2"></span>';
                echo '<button type="button" class="btn btn-outline-light fw-bold">+</button>';
                echo '</section>';

                echo '<div style="height: 100px;">';
                echo '<div class="mh-100" style="width: 100px; height: 200px;"></div>';
                echo '</div>';
                
                echo '<h3 class="text-uppercase">Détails</h3>';
                echo '<section id="info">';
                echo '<p id="txt" class="fs-6">Durée : ' . $duration . ' min</p>';
                echo '<p id="txt" class="fs-6">Date de sortie : ' . $date . '</p>';
                echo '<p id="txt" class="fs-6">Genre : </p>';
                echo '<p id="txt" class="fs-6">Réalisation : ' . $dir . '</p>';

                echo '<p id="txt" class="fs-6">Episodes : ' . $episodes . '</p>';
                echo '<p id="txt" class="fs-6">Saisons : ' . $seasons . '</p>';

                echo '<p id="txt" class="fs-6">Budget : ' . $cost . '</p>';
                echo '<p id="txt" class="fs-6">Récompense : ' . $award . '</p>';
                echo '<p id="txt" class="fs-6">Note : ' . $note . '</p>';
                echo '</section>';
            }
        ?>

    <?php require 'commun/footer.html'?>
</body>
</html>