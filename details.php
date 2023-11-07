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
    <?php require 'commun/header.html'?>
    
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

        // Vérifiez si le formulaire a été soumis
        //if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérez la valeur de l'entrée de l'utilisateur
            $searchQuery = "Thor: Ragnarok";

            // Utilisez votre requête SPARQL ici pour récupérer les données
            $sparqlQuery = "
            SELECT ?itemLabel ?pic ?note ?cost ?award ?duration ?dir ?date
            WHERE {
                ?item wdt:P1476 ?itemLabel. # Title
                ?item wdt:P2047 ?duration.
                ?item wdt:P57 ?dir.
                ?item wdt:P31 wd:Q11424.  # Film
                ?item wdt:P750 wd:Q54958752.  # Platform = Disney+
                FILTER(CONTAINS(UCASE(?itemLabel), UCASE('$searchQuery')))
                    OPTIONAL{
                    ?item wdt:P154 ?pic.
                    ?item wdt:P1258 ?note.
                    #?item wdt:P166 ?award.
                    ?item wdt:P2130 ?cost.
                    #?item wdt:P580 ?date.
                }
            }
            ORDER BY DESC (?pic)
            ";

            $searchResults = fetchWikidataResults($sparqlQuery);

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

                $imageSrc = ($pic != 'N/A' && !empty($pic)) ? $pic : 'assets/ralu+w.png';

                // Générez une carte HTML pour chaque résultat
                echo '<img id="info" src="' . $imageSrc . '" class="rounded bg-white float-start">';
                echo '<h4 class="text-warning">Disponible dès maintenant en IMAX Enhanced</h4>';
                echo '<section id="info">';
                echo '<p id="txt" class="fs-6">' . $date . ' - ' . $duration . ' min</p>';
                echo '<p id="txt" class="fs-6">Genre</p>';
                echo '</section>';
                echo '<section id="infoBtn">';
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
                echo '<p id="txt" class="fs-6">Budget : ' . $cost . '</p>';
                echo '<p id="txt" class="fs-6">Récompense : ' . $award . '</p>';
                echo '<p id="txt" class="fs-6">Note : ' . $note . '</p>';
                echo '</section>';
            }
        //}
        ?>
<!--
        <img id="info" src="..." class="rounded float-start" alt="...">

        <h4 class="text-warning">Disponible dès maintenant en IMAX Enhanced</h4>

        <section id="info">
            <p id="txt" class="fs-6">Année - Durée</p>
            <p id="txt" class="fs-6">Genre</p>
        </section>
        
        <section id="infoBtn">
            <button type="button" class="btn btn-light fw-bold">LECTURE</button>
            <button type="button" class="btn btn-outline-light fw-bold">BANDE-ANNONCE</button>
            <span class="mx-2"></span>
            <button type="button" class="btn btn-outline-light fw-bold">+</button>
        </section>

        <div style="height: 100px;">
            <div class="mh-100" style="width: 100px; height: 200px;"></div>
        </div>

        <h3 class="text-uppercase">Détails</h3>

        <section id="info">
            <p id="txt" class="fs-6">Durée : </p>
            <p id="txt" class="fs-6">Date de sortie : </p>
            <p id="txt" class="fs-6">Genre : </p>
            <p id="txt" class="fs-6">Réalisation : </p>
            <p id="txt" class="fs-6">Budget : </p>
            <p id="txt" class="fs-6">Récompense : </p>
            <p id="txt" class="fs-6">Note : </p>
        </section>
        -->
    <?php require 'commun/footer.html'?>
</body>
</html>