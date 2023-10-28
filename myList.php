<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="cl.css">
    <title>Ma liste</title>
</head>
<body>
    <?php require 'commun/header.html'?>

    <div style="height: 100px;">
        <div class="mh-100" style="width: 100px; height: 200px;"></div>
    </div>

    <h1>Ma liste</h1>

   <Section id="list">
    <div class="row mb-3 text-leading">
        <div class="col-md-3 themed-grid-col">
            <div class="card text-bg-dark" style="width:250px;" onclick="redirectToPage('details.php')">
                <img src="assets/cat/starwars.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h6 class="card-title">Card title</h6>
                    </div>
                </div>
        </div>
        <div class="col-md-3 themed-grid-col">
            <div class="card text-bg-dark" style="width:250px;" onclick="redirectToPage('details.php')">
                <img src="assets/cat/starwars.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h6 class="card-title">Card title</h6>
                    </div>
                </div>
        </div>
        <div class="col-md-3 themed-grid-col">
            <div class="card text-bg-dark" style="width:250px;" onclick="redirectToPage('details.php')">
                <img src="assets/cat/starwars.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h6 class="card-title">Card title</h6>
                    </div>
                </div>
        </div>
        <div class="col-md-3 themed-grid-col">
            <div class="card text-bg-dark" style="width:250px;" onclick="redirectToPage('details.php')">
                <img src="assets/cat/starwars.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h6 class="card-title">Card title</h6>
                    </div>
                </div>
        </div>
        <div class="col-md-3 themed-grid-col">
            <div class="card text-bg-dark" style="width:250px;" onclick="redirectToPage('details.php')">
                <img src="assets/cat/starwars.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h6 class="card-title">Card title</h6>
                    </div>
                </div>
        </div>
        <div class="col-md-3 themed-grid-col">
            <div class="card text-bg-dark" style="width:250px;" onclick="redirectToPage('details.php')">
                <img src="assets/cat/starwars.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h6 class="card-title">Card title</h6>
                    </div>
                </div>
        </div>
        <div class="col-md-3 themed-grid-col">
            <div class="card text-bg-dark" style="width:250px;" onclick="redirectToPage('details.php')">
                <img src="assets/cat/starwars.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h6 class="card-title">Card title</h6>
                    </div>
                </div>
        </div>
        <div class="col-md-3 themed-grid-col">
            <div class="card text-bg-dark" style="width:250px;" onclick="redirectToPage('details.php')">
                <img src="assets/cat/starwars.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h6 class="card-title">Card title</h6>
                    </div>
                </div>
        </div>
    </div>
   </Section>

    <?php require 'commun/footer.html'?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>