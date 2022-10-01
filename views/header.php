<!DOCTYPE html>
<html lang="fr" class="h-100">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- icone du site -->
    <link rel="icon" type="image/png" href="img/favicon.png">

    <link rel="stylesheet" href="css/style.css">
    <script src="js/index.js" defer></script>

    <!-- Weather Icons -->
    <link rel="stylesheet" href="css/weather-icons/weather-icons.min.css">
    <link rel="stylesheet" href="css/weather-icons/weather-icons-wind.min.css">
    <!-- Weather Icons -->
    
    <!-- jQuery + Popper + Bootstrap -->
    <script src="js/jquery/jquery.min.js"></script>
    <script src="js/popper/popper.min.js"></script>
    <script src="js/bootstrap/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="css/bootstrap/bootstrap.min.css">
    <!-- jQuery + Popper + Bootstrap -->

    <title>Weather App</title>
</head>
<body class="d-flex flex-column h-100">
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
            <a class="navbar-brand" href="/">Weather App</a>
            
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item" id="accueil">
                        <a class="nav-link" href="/accueil">Accueil</a>
                    </li>
                    <li class="nav-item" id="reglages">
                        <a class="nav-link" href="/reglages">Réglages</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>


    <div id="content">