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
<!--
    <section id="sec">
        <div class="container px-4 text-center align-items-center" id="cont">
            <div class="row gx-5 align-items-center justify-content-between">
                <div class="col-2 p-2 align-self-center" id="bloc1">
                    <div class="p-3" id="div2">
                        <img src="assets/cat/disney.png" width="130" height="auto">
                    </div>
                </div>
                <div class="col-2 p-2" id="bloc1">
                    <div class="p-3" id="div2">
                        <img src="assets/cat/pixar.png" width="130" height="auto">
                    </div>
                </div>
                <div class="col-2 p-2" id="bloc1">
                    <div class="p-3" id="div2">
                        <img src="assets/cat/marvel.png" width="130" height="auto">
                    </div>
                </div>
                <div class="col-2 p-2" id="bloc1">
                    <div class="p-3" id="div2">
                        <img src="assets/cat/starwars.png" width="130" height="auto">
                    </div>
                </div>
                <div class="col-2 p-2" id="bloc1">
                    <div class="p-3" id="div2">
                        <img src="assets/cat/star.png" width="130" height="auto">
                    </div>
                </div>
            </div>
        </div>
    </section>
-->
    <section id="sec">
        <div class="container px-4 text-center align-items-center" id="cont">
            <div class="row gx-5 align-items-center justify-content-between">
                <div class="col-2 p-2 align-self-center bloc-container">
                    <div class="p-3 div2 d-flex justify-content-center" onclick="redirectToPage('disney.php')">
                        <img src="assets/cat/disney.png" width="130" height="auto">
                    </div>
                </div>
                <div class="col-2 p-2 bloc-container">
                    <div class="p-3 div2 2d-flex justify-content-center" onclick="redirectToPage('pixar.php')">
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
                    <div class="p-3 div2 d-flex justify-content-center" onclick="redirectToPage('national.php')">
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
    <section id="list">
        <div class="row overflow-auto" id="listCard">
            <div class="card text-bg-dark" style="width:250px;" onclick="redirectToPage('details.php')">
                <img src="assets/cat/starwars.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h6 class="card-title">Card title</h6>
                </div>
            </div>
            <div class="card text-bg-dark" style="width:250px;">
                <img src="assets/cat/starwars.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h6 class="card-title">Card title</h6>
                </div>
            </div>
            <div class="card text-bg-dark" style="width:250px;">
                <img src="assets/cat/starwars.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h6 class="card-title">Card title</h6>
                </div>
            </div>
            <div class="card text-bg-dark" style="width:250px;">
                <img src="assets/cat/starwars.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h6 class="card-title">Card title</h6>
                </div>
            </div>
            <div class="card text-bg-dark" style="width:250px;">
                <img src="assets/cat/starwars.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h6 class="card-title">Card title</h6>
                </div>
            </div>
            <div class="card text-bg-dark" style="width:250px;">
                <img src="assets/cat/starwars.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h6 class="card-title">Card title</h6>
                </div>
            </div>
        </div>
    </section>

<!--
    <section id="list">
        <div class="scroll-container">
        <button id="prevButton">Previous</button>
            <div class="row" id="listCard">
                <div class="card text-bg-dark" style="width:250px;">
                    <img src="assets/cat/starwars.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h6 class="card-title">Card title</h6>
                    </div>
                </div>
                <div class="card text-bg-dark" style="width:250px;">
                    <img src="assets/cat/starwars.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h6 class="card-title">Card title</h6>
                    </div>
                </div>
                <div class="card text-bg-dark" style="width:250px;">
                    <img src="assets/cat/starwars.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h6 class="card-title">Card title</h6>
                    </div>
                </div>
                <div class="card text-bg-dark" style="width:250px;">
                    <img src="assets/cat/starwars.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h6 class="card-title">Card title</h6>
                    </div>
                </div>
            </div>
            <button id="nextButton">Next</button>
        </div>
    </section>

    <script>
        document.getElementById('nextButton').addEventListener('click', function () {
            let listCard = document.getElementById('listCard');
            let scrollAmount = 250; // Ajustez la valeur selon votre besoin
            listCard.style.transform = `translateX(-${scrollAmount}px)`;
        });

        document.getElementById('prevButton').addEventListener('click', function () {
            let listCard = document.getElementById('listCard');
            let scrollAmount = 250; // Ajustez la valeur selon votre besoin
            listCard.style.transform = `translateX(${scrollAmount}px)`;
        });
    </script>
    -->

    <h4 class="mt-4">Action et aventure</h4>
    <section id="list">
        <div class="row" id="listCard">
            <div class="card text-bg-dark" style="width:250px;">
                <img src="assets/cat/starwars.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h6 class="card-title">Card title</h6>
                </div>
            </div>
            <div class="card text-bg-dark" style="width:250px;">
                <img src="assets/cat/starwars.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h6 class="card-title">Card title</h6>
                </div>
            </div>
            <div class="card text-bg-dark" style="width:250px;">
                <img src="assets/cat/starwars.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h6 class="card-title">Card title</h6>
                </div>
            </div>
            <div class="card text-bg-dark" style="width:250px;">
                <img src="assets/cat/starwars.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h6 class="card-title">Card title</h6>
                </div>
            </div>
        </div>
    </section>

    <h4 class="mt-4">Salués par la critique</h4>
    <section id="list">
        <div class="row" id="listCard">
            <div class="card text-bg-dark" style="width:250px;">
                <img src="assets/cat/starwars.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h6 class="card-title">Card title</h6>
                </div>
            </div>
            <div class="card text-bg-dark" style="width:250px;">
                <img src="assets/cat/starwars.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h6 class="card-title">Card title</h6>
                </div>
            </div>
            <div class="card text-bg-dark" style="width:250px;">
                <img src="assets/cat/starwars.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h6 class="card-title">Card title</h6>
                </div>
            </div>
            <div class="card text-bg-dark" style="width:250px;">
                <img src="assets/cat/starwars.png" class="card-img-top" alt="...">
                <div class="card-body">
                    <h6 class="card-title">Card title</h6>
                </div>
            </div>
        </div>
    </section>

    <?php require 'commun/footer.html'?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
</html>
