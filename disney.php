<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="cl.css">
    <title>Disney</title>
</head>
<body>
    <?php require 'commun/header.php'?>

    <div style="height: 65px;">
        <div class="mh-100" style="width: 100px; height: 65px;"></div>
    </div>

    <img src="assets/cat/disneyCat.png" class="img-fluid">

    <Section id="list">
    <div class="row mb-3 text-leading">
        <?php

        function fetchWikidataResults($sparqlQuery) {
            $url = 'https://query.wikidata.org/sparql?query=' . urlencode($sparqlQuery) . '&format=json';

            // Utilisez cURL pour récupérer les données JSON
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array('Accept: application/json'));
            curl_setopt($ch, CURLOPT_USERAGENT, 'YourApp/1.0');

            $result = curl_exec($ch);

            // Afficher les informations de la requête
            //echo 'Informations de la requête cURL :';
            //var_dump(curl_getinfo($ch));

            if (curl_errno($ch)) {
                echo 'Erreur cURL : ' . curl_error($ch);
            }/* else {
                echo 'Contenu de la réponse : ' . $result;
            }*/

            curl_close($ch);

            $data = json_decode($result, true);

            return $data;
        }

        // Utilisez votre requête SPARQL ici pour récupérer les données
        $sparqlQuery = '
        SELECT ?itemLabel ?pic
        WHERE {
        {
            ?filmItem wdt:P1476 ?itemLabel. # Title
            ?filmItem wdt:P31 wd:Q11424.  # Film
            ?filmItem wdt:P750 wd:Q54958752.  # Platform = Disney+
            ?filmItem wdt:P272 wd:Q191224. # Disney

            OPTIONAL {
            ?filmItem wdt:P154 ?pic.
            }
        }
        UNION
        {
            ?seriesItem wdt:P1476 ?itemLabel. # Title
            ?seriesItem wdt:P31 wd:Q5398426.  # Television series
            ?seriesItem wdt:P750 wd:Q54958752.  # Platform = Disney+
            ?seriesItem wdt:P272 wd:Q191224. # Disney

            OPTIONAL {
            ?seriesItem wdt:P154 ?pic.
            }
        }
        }
        ORDER BY DESC (?pic)
        ';

        $searchResults = fetchWikidataResults($sparqlQuery);

        //var_dump($searchResults);

        // Afficher les résultats dans des cartes HTML
        foreach ($searchResults['results']['bindings'] as $result) {
            $title = $result['itemLabel']['value'];
            $pic = isset($result['pic']['value']) ? $result['pic']['value'] : 'N/A';

            $imageSrc = ($pic != 'N/A' && !empty($pic)) ? $pic : 'assets/ralu+w.png';

            // Générez une carte HTML pour chaque résultat
            echo '<div class="col-md-3 themed-grid-col">';
            echo '<div class="card text-bg-dark" style="width:250px;" onclick="redirectToPage(\'details.php\')">';
            echo '<img src="' . $imageSrc . '" class="card-img-top" alt="...">';
            echo '<div class="card-body">';
            echo '<h6 class="card-title">' . $title . '</h6>';
            echo '</div>';
            echo '</div>';
            echo '</div>';
        }
        ?>
    </div>
</Section>

    <?php require 'commun/footer.html'?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script></body>
</html>